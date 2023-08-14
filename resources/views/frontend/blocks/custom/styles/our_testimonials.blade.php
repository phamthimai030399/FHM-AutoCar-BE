@if ($block)
    @php
        
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $image_for_screen = null;
        if ($agent->isDesktop() && $image_background != null) {
            $image_for_screen = $image_background;
        } else {
            $image_for_screen = $image;
        }
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $block_icon = $block_childs->filter(function ($items, $key) {
            return $items->icon != null;
        });
        $block_icon = $block_childs->filter(function ($items, $key) {
            return $items->icon != null;
        });
        $block_content = $block_childs->filter(function ($items, $key) {
            return $items->icon == null;
        });
        
    @endphp

    <div class="our-testimonial">
        <div class="container">
            <div class="d-flex flex-column our-testimonial-title">
                <div class="text-center our-testimonial-title-bottom">
                    <span>{{ $title }}</span>
                    <p>{{ $brief }}</p>
                </div>
                <div id="peopleSayingCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @if ($block_content)
                            @foreach ($block_content as $item)
                                @php
                                    $title_child = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_child = $item->image != '' ? $item->image : null;
                                    $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
                                    $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon_child = $item->icon != '' ? $item->icon : '';
                                    $style = $item->json_params->style ?? '';
                                @endphp
                                <div class="carousel-item active">
                                    <div class="col-4 text-center d-flex align-items-center flex-column px-5">
                                        <div>
                                            <h3 class="title">{{ $title_child }}</h3>
                                            <p>
                                                {{ $brief_child }}
                                            </p>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="star">
                                                {!! $icon !!}
                                                {!! $icon !!}
                                                {!! $icon !!}
                                                {!! $icon !!}
                                                {!! $icon !!}
                                            </div>
                                            <img src="{{ $image_child }}" alt=""
                                                class="rounded-circle avatar" />
                                            <div class="person-name">{{ $url_link }}</div>
                                            <div class="person-description">
                                                {{ $url_link_title }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev bg-white w-aut" href="#peopleSayingCarousel" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-white w-aut" href="#peopleSayingCarousel" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
                <div class="our-testimonial-partner d-flex justify-content-between">
                    @if ($block_icon)
                        @foreach ($block_icon as $item)
                            @php
                                $icon_child = $item->icon != '' ? $item->icon : '';
                            @endphp
                            <div class="our-testimonial-partner-img">
                                {!! $icon_child !!}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
