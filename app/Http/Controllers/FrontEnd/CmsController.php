<?php

namespace App\Http\Controllers\FrontEnd;

use App\Consts;
use App\Region;
use App\Helpers;
use App\Http\Services\ContentService;
use App\Models\CmsTaxonomy;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class CmsController extends Controller
{
    /**
     * All taxonomy and page custom is called throw this function
     * Check by alias in table pages before check in table taxonomys
     *  */
    public function postCategory($alias = null, Request $request)
    {
        $params_page['alias'] = $alias;
        $page = ContentService::getPage($params_page)->first();
        $this->responseData['City'] = Region::DATA;
        $this->responseData['Product_type'] = Consts::Product_type;
        $this->responseData['Type_price'] = Consts::type_price;
        $this->responseData['DataBedr'] = Consts::DataBedr;
        $this->responseData['DataBathr'] = Consts::DataBathr;

        if ($page) {
            if (!$page->is_page) {
                return redirect()->route('frontend.home')->with('errorMessage', __('Page is not found!'));
            } else {
                $this->responseData['page'] = $page;
                return $this->responseView('frontend.pages.custom.index');
            }
        }

        if ($alias != '') {
            $params['alias'] = $alias;
            $params['status'] = Consts::TAXONOMY_STATUS['active'];
            $taxonomy = ContentService::getCmsTaxonomy($params)->first();

            if ($taxonomy) {
                $this->responseData['taxonomy'] = $taxonomy;
                if ($taxonomy->sub_taxonomy_id != null) {
                    $str_taxonomy_id = $taxonomy->id . ',' . $taxonomy->sub_taxonomy_id;
                    $paramPost['taxonomy_id'] = array_map('intval', explode(',', $str_taxonomy_id));
                } else {
                    $paramPost['taxonomy_id'] = $taxonomy->id;
                }

                $paramPost['status'] = Consts::POST_STATUS['active'];
                $paramPost['is_type'] = $taxonomy->taxonomy;

                $this->responseData['posts'] = ContentService::getCmsPost($paramPost)->paginate(Consts::PAGINATE[$taxonomy->taxonomy]);
                return $this->responseView('frontend.pages.' . $taxonomy->taxonomy . '.category');
            } else {
                return redirect()->back()->with('errorMessage', __('not_found'));
            }
        }


        return redirect()->back()->with('errorMessage', __('not_found'));
    }
    public function encrypt_decrypt($string, $action = 'encrypt')
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'AA74CDDC2BBRT935136EE0B63C27';
        $secret_iv = 'Ofgf5HJ6g29';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    public function detail($alias_category = null, $alias = null, Request $request)
    {
        if ($alias != '') {
            $this->responseData['City'] = Region::DATA;
            $this->responseData['Product_type'] = Consts::Product_type;
            $this->responseData['Type_price'] = Consts::type_price;
            $this->responseData['DataBedr'] = Consts::DataBedr;
            $this->responseData['DataBathr'] = Consts::DataBathr;

            $params['alias'] = $alias;
            $params['status'] = Consts::POST_STATUS['active'];
            $detail = ContentService::getCmsPost($params)->first();
            $review = Review::where('status', 'active')->where('id_product',$detail->id)->orderBy("created_at","desc")->get();

            
            if ($detail) {
                $detail->count_visited = $detail->count_visited + 1;
                $detail->save();
                $this->responseData['detail'] = $detail;
                $this->responseData['review'] = $review;
                $params['is_type'] = $detail->is_type;
                // Tags of this post
                if (isset($detail->json_params->tags)) {
                    $this->responseData['tags'] = CmsTaxonomy::where('status', Consts::TAXONOMY_STATUS['active'])
                        ->where('taxonomy', Consts::TAXONOMY['tags'] ?? '')
                        ->whereIn('tb_cms_taxonomys.id', $detail->json_params->tags ?? [])
                        ->get();
                }
                // Related post
                $params['alias'] = null;
                if (isset($detail->json_params->related_post)) {
                    $params['order_by'] = 'id';
                    $params['related_post'] = $detail->json_params->related_post ?? null;
                    $this->responseData['relatedPosts'] = ContentService::getCmsPost($params)->limit(Consts::PAGINATE['related'])->get();
                }

                // Return to view with type post
                if (View::exists('frontend.pages.' . $detail->is_type . '.detail')) {
                    return $this->responseView('frontend.pages.' . $detail->is_type . '.detail');
                } else {
                    return redirect()->back()->with('errorMessage', 'View: frontend.pages.' . $detail->is_type . '.detail do not exists!');
                }
            }
        }

        return redirect()->back()->with('errorMessage', __('not_found'));
    }
}
