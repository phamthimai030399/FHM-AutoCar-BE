@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $id = $block->json_params->id->{$locale} ?? $block->id;
        $sub = $block->json_params->sub->{$locale} ?? $block->sub;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        
        // Filter all blocks by parent_id
        $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['is_featured'] = true;
        $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
        // dd($taxonomys);
        $left_box_taxonomys = $taxonomys
            ->filter(function ($item) {
                return $item['iorder'] <= 2;
            })
            ->take(2);
        $betwen_box_taxonomys = $taxonomys
            ->filter(function ($item) {
                return $item['iorder'] == 3;
            })
            ->take(1);
        $right_box_taxonomys = $taxonomys
            ->filter(function ($item) {
                return $item['iorder'] > 3 and $item['iorder'] <= 5;
            })
            ->take(2);
    @endphp

    <div class="form-product-best-seller product-category">
        <div class="container">
            <div class="d-flex flex-column gap-30">
                <div class="product-best-selle-title text-center mb-5">
                    <h2 class="title"
                        style="background: url({{ $background }});  background-size: 80% 100%;
                    background-repeat: no-repeat;
                    background-position: center center;">
                        {{ $title }}</h2>
                </div>
                @if ($taxonomys)
                    <div class="form-product-category row">
                        <div class="col-12 col-md-3 p-0 colum-form-product-category row m-0 justify-content-between">
                            @if ($left_box_taxonomys)
                                @foreach ($left_box_taxonomys as $item_taxonomys)
                                    @php
                                        $title_taxonomys = $item_taxonomys->json_params->title->{$locale} ?? $item_taxonomys->title;
                                        $image_taxonomys = $item_taxonomys->json_params->image ?? $item_taxonomys->image;
                                        $url_link_title_taxonomys = $item_taxonomys->json_params->url_link_title ?? $item_taxonomys->url_link_title;
                                    @endphp
                                    <div class="item-product-category p-1">
                                        <img class="" width="" src="{{ $image_taxonomys }}" alt="" />
                                        <div class="d-flex flex-column content-product-category pt-lg-5">
                                            <span>{{ $title_taxonomys }}</span>
                                            <a href="">{{$url_link_title_taxonomys}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-12 col-md-6 p-0">
                            @if ($betwen_box_taxonomys)
                                @foreach ($betwen_box_taxonomys as $item_taxonomys)
                                    @php
                                        $title_taxonomys = $item_taxonomys->json_params->title->{$locale} ?? $item_taxonomys->title;
                                        $image_taxonomys = $item_taxonomys->json_params->image ?? $item_taxonomys->image;
                                        $url_link_title_taxonomys = $item_taxonomys->json_params->url_link_title ?? $item_taxonomys->url_link_title;
                                    @endphp
                                    <div class="item-product-category p-1">
                                        <img class="" width="" src="{{ $image_taxonomys }}"
                                            alt="" />
                                        <div class="d-flex flex-column content-product-category pt-lg-5">
                                            <span>{{ $title_taxonomys }}</span>
                                            <a href="">{{$url_link_title_taxonomys}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-12 col-md-3 p-0 colum-form-product-category row m-0 justify-content-between">
                            @if ($right_box_taxonomys)
                                @foreach ($right_box_taxonomys as $item_taxonomys)
                                    @php
                                        $title_taxonomys = $item_taxonomys->json_params->title->{$locale} ?? $item_taxonomys->title;
                                        $image_taxonomys = $item_taxonomys->json_params->image ?? $item_taxonomys->image;
                                        $url_link_title_taxonomys = $item_taxonomys->json_params->url_link_title ?? $item_taxonomys->url_link_title;
                                    @endphp
                                    <div class="item-product-category p-1">
                                        <img class="" width="" src="{{ $image_taxonomys }}"
                                            alt="" />
                                        <div class="d-flex flex-column content-product-category pt-lg-5">
                                            <span>{{ $title_taxonomys }}</span>
                                            <a href="">{{$url_link_title_taxonomys}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                @endif
            </div>
        </div>
    </div>
@endif
