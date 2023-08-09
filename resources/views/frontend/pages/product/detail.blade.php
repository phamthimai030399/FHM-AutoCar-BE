@extends('frontend.layouts.default')

@php
    $title = $detail->json_params->title->{$locale} ?? $detail->title;
    $brief = $detail->json_params->brief->{$locale} ?? 'Mô tả đang cập nhật';
    $price = $detail->json_params->price ?? null;
    $content = $detail->json_params->content->{$locale} ?? null;
    $image = $detail->image != '' ? $detail->image : null;
    $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : ($web_information->image->background_breadcrumbs ?? null);
    $date = date('H:i d/m/Y', strtotime($detail->created_at));
    // For taxonomy
    $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
    $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
    $taxonomy_brief = $taxonomy_json_params->brief->{$locale}??"";
    $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
    $taxonomy_alias = Str::slug($taxonomy_title);
    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $taxonomy_alias, $detail->taxonomy_id);
    
    $seo_title = $detail->json_params->seo_title ?? $title;
    $seo_keyword = $detail->json_params->seo_keyword ?? null;
    $seo_description = $detail->json_params->seo_description ?? $brief;
    $seo_image = $image ?? ($image_thumb ?? null);
    $image_product_screen = null;
    if ($agent->isDesktop() && $image != null) {
        $image_product_screen = $image;
    } else {
        $image_product_screen = $image_thumb;
    }
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    $params['is_type'] = App\Consts::TAXONOMY['product'];
    $rows = App\Http\Services\ContentService::getCmsPost($params)->get();
@endphp

@push('style')
    <style>
.learning_detail .bg_page {
    background: url({{$image_product_screen}});
    background-size: 100% 100%;
    background-repeat: no-repeat;
    height: auto;
    min-height: 200px;
    max-height: 570px;
}
    </style>
@endpush

@section('content')
    {{-- Print all content by [module - route - page] without blocks content at here --}}
  
    <div id="site-main" class="site-main learning_detail">
        <div id="main-content" class="main-content">
            <div id="content" class="site-content" role="main">
                <section id="slider" class="">
                    <div id="title" class="page-title">
                        <div class="bg_page">
                            <div class="container d-flex justify-content-md-end">
                                <div class="col-12 col-md-9 mt_page_title">
                                    <p class="font-playball grey">{{$taxonomy_title}}</p>
                                    <h2 class="text-uppercase title">
                                        <span class="green">YOGA</span> STUDIO
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="detail">
                    <div class="container">
                        <div class="box_title text-center mb-3 mb-lg-5">
                            <h2 class="title text-uppercase">{!!$taxonomy_brief!!}</h2>
                            <p class="bref">{{$title}}</p>
                        </div>
                        <div class="box_detail d-flex flex-wrap align-items-lg-center">
                            <div class="col-12 col-lg-3">
                                <div class="box bora-30 bg_green white text-center">
                                    <h3 class="title text-uppercase">
                                        {{$title}}
                                    </h3>
                                    <hr class="line" />
                                    <div class="money "><sup>$</sup>{{$price}}</div>
                                    <div class="mt-5">
                                        <a href="#form_learning">
                                            <button
                                            class="btn btn-light font-weight-bold text-uppercase bora-30 text-uppercase pr-4 pl-4">
                                            Mua gói
                                        </button>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 p-4">
                                <div class="frame bref">
                                    {!!$content!!}
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 p-3 bd_l">
                                <div class="box_ul_star">
                                    <div class="content">
                                        {!!$brief!!}
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="form_learning">
                    <div class="container">
                        <div class="box_title text-center mb-3 mb-lg-5">
                            <h2 class="title text-uppercase">Form đăng ký thông tin</h2>
                            <p class="bref">Vui lòng điền thông tin và chọn gói tập</p>
                        </div>
                        <form class="form_ajax" action="{{ route('frontend.contact.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="is_type" value="contact">
                            <div class="box_form">
                                <div class="d-flex flex-wrap">
                                    <div class="col-12 col-lg-6 p-3 p-lg-5">
                                        <p class="title text-uppercase">Thông tin tài khoản</p>
                                        <div class="form-group">
                                            <label for="name">Họ và tên <sup>*</sup></label>
                                            <input type="text" name="name" id="name" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại <sup>*</sup></label>
                                            <input type="text" name="phone" id="phone" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Email <sup>*</sup></label>
                                            <input type="email" name="email" id="email" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 p-3 p-lg-5">
                                        <p class="title text-uppercase">Thông tin gói tập</p>
                                        <div class="form-group">
                                            <label for="pack">Vui lòng chọn gói tập</label>
                                            <select name="json_params[product]" id="pack" class="form-control">
                                                <option value="">@lang('Please select')</option>
                                                @foreach ($rows as $item)
                                                    <option value="{{$item->id}}" {{($detail->id == $item->id)?'selected':''}}>{{$item->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <p class="title text-uppercase">Thông tin thanh toán</p>
                                        <div class="box_radio">
                                            <div class="custom-control custom-radio">
                                                <input id="direct" name="json_params[payment]" type="radio" class="custom-control-input"
                                                    checked value="direct" />
                                                <label class="custom-control-label" for="direct">Thanh toán trực tiếp</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="card" name="json_params[payment]" type="radio" class="custom-control-input"
                                                    value="card" />
                                                <label class="custom-control-label" for="card">Thanh toán qua thẻ</label>
                                            </div>
                                        </div>
                                        <div class="d-flex overflow-auto">
                                            <img class="pr-2 pr-lg-4" width="85px" src="{{ url('data/cms-image/icon/pay1.png') }}"
                                                alt="Yoga studio" />
                                            <img class="pr-2 pr-lg-4" width="85px" src="{{ url('data/cms-image/icon/pay2.png') }}"
                                                alt="Yoga studio" />
                                            <img class="pr-2 pr-lg-4" width="85px" src="{{ url('data/cms-image/icon/pay3.png') }}"
                                                alt="Yoga studio" />
                                            <img class="pr-2 pr-lg-4" width="85px" src="{{ url('data/cms-image/icon/pay4.png') }}"
                                                alt="Yoga studio" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-5">
                                <input class="btn btn-dark font-weight-bold bora-30 pr-4 pl-4" type="submit" value="Gửi" />
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    {{-- End content --}}
@endsection
