@extends('frontend.layouts.default')

@php
    $title = $detail->json_params->title->{$locale} ?? $detail->title;
    $name_admin = $detail->name ?? '';
    $brief = $detail->json_params->brief->{$locale} ?? null;
    $content = $detail->json_params->content->{$locale} ?? null;
    $image = $detail->image != '' ? $detail->image : null;
    $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
    $date = date('H:i d/m/Y', strtotime($detail->created_at));
    
    // For taxonomy
    $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
    $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
    $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
    $taxonomy_alias = Str::slug($taxonomy_title);
    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
    
    $seo_title = $detail->json_params->seo_title ?? $title;
    $seo_keyword = $detail->json_params->seo_keyword ?? null;
    $seo_description = $detail->json_params->seo_description ?? $brief;
    $seo_image = $image ?? ($image_thumb ?? null);
    
    // schema information
    $datePublished = date('d/m/Y', strtotime($detail->created_at));
    $dateModified = date('Y-m-d', strtotime($detail->updated_at));

    if ($agent->isDesktop() && $image_background != null) {
        $image_for_screen = $image_background;
    } else {
        $image_for_screen = $image != null ? $image : $web_information->image->background_breadcrumbs ?? '';
    }
@endphp

@push('style')
    <style>
        .bg_page {
            background: url({{ $image_for_screen }});
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: auto;
            min-height:200px;
            max-height: 570px;
        }
    </style>
@endpush


@section('content')
    <div class="bodywrap container">
        <section id="slider" class="">
            <div id="title" class="page-title">
                <div class="bg_page">
                    <div class="container d-flex justify-content-md-end">
                        <div class="col-12 col-md-6 mt_page_title">
                            <h2 class="title">
                                <p class="font-playball grey">{{ $taxonomy_title }}</p>
                                <span class="green">YOGA</span> STUDIO
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blogpage mt-5">
            <div class="container layout-article">
                <div class="bg_blog">
                    <article class="article-main">
                        <div class="row">
                            <div class="right-content col-xl-8 col-lg-8 col-12">
                                <div class="article-details">
                                    <h1 class="article-title">
                                        {{ $title }}
                                    </h1>

                                    <span class="time_post">
                                        <span class="name_"><i class="fas fa-user-tie"></i>&nbsp;{{$name_admin}}</span>
                                        &nbsp; | &nbsp;
                                        <span><i class="far fa-clock"></i>&nbsp;Ngày {{ $datePublished }}</span>
                                    </span>
                                    <div class="article-content">
                                        <div class="rte">
                                            {!! $content ?? '' !!}
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                            @include('frontend.components.sidebar.post')
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
    {{-- Print all content by [module - route - page] without blocks content at here --}}


    {{-- End content --}}
@endsection