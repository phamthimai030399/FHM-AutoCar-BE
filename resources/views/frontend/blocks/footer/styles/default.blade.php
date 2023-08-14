<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mt-3">
                <span class="title">Contact Us</span>
                <div class="footer-content">
                    @isset($web_information->information->address)
                        <p>Address: {{ $web_information->information->address ?? '' }}</p>
                    @endisset
                    @isset($web_information->information->phone)
                        <p>Phone: {{ $web_information->information->phone ?? '' }}</p>
                    @endisset
                    @isset($web_information->information->email)
                        <p>Email: {{ $web_information->information->email ?? '' }}</p>
                    @endisset
                </div>
            </div>
            @isset($menu)
                @php
                    
                    $footer_menu = $menu->filter(function ($item, $key) {
                        return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                    });
                @endphp
                @foreach ($footer_menu as $main_menu)
                    @php
                        $url = $title = '';
                        $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                        $iorder = isset($main_menu->json_params->iorder) && $main_menu->json_params->iorder != '' ? $main_menu->json_params->iorder : $main_menu->iorder;
                    @endphp
                    @if ($iorder <= 3)
                        <div class="col-12 col-md-3 mt-3">
                            <div class="block block-menu">
                                <span class="title">{{ $title }}</span>
                                <div class="footer-content column-md-2">
                                    @foreach ($menu as $item)
                                        @if ($item->parent_id == $main_menu->id)
                                            @php
                                                $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            @endphp
                                            <a href="">{{$title}}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-12 col-md-2 mt-3 text-center text-md-start">
                            <span class="title">Follow Us on</span>
                            <div class="footer-content box-icon">
                                @foreach ($menu as $item)
                                    @if ($item->parent_id == $main_menu->id)
                                        @php
                                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            $icon = isset($item->json_params->icon) && $item->json_params->icon != '' ? $item->json_params->icon : '';
                                        @endphp
                                        {!!$icon!!}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endisset
        </div>
        <div class="footer-bottom d-flex justify-content-between">
            <span>2023 © Copyright of FHM Vietnam. All Right Reserved.</span>
            <span>Powered & Designed by FHMVietnam.com</span>
        </div>
    </div>
</footer>
