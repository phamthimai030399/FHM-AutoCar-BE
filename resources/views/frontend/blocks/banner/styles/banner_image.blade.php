@if ($block)
    @php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $image = $block->image != '' ? $block->image : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
        
        // $image_for_screen = null;
        // if ($agent->isDesktop() && $image_background != null) {
        //     $image_for_screen = $image_background;
        // } else {
        //     $image_for_screen = $image;
        // }
        
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    @endphp
    <style>
        .banner {
            background: url({{ $image_background }}) no-repeat center center;
            background-size: cover;
        }

        @media (min-width: 768px) {
            .banner {
                background: url({{ $image }}) no-repeat center center;
            }
        }
    </style>
    <div class="banner">
        <div class="container">
            <div class="banner-content">
                <a href="" class="btn-best-price text-uppercase text-center">best price</a>
                <div class="mt-3 service">
                    {{ $brief }}
                </div>
                <p class="mt-3">
                    {{ $content }}
                </p>
                <a href="" class="btn-shop-now text-uppercase text-center mt-md-4 mt-3 d-inline-flex">{{ $url_link_title }}</a>
            </div>
        </div>
    </div>
@endif
