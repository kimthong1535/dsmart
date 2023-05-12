{{--

    Template Name: Cựu sinh viên

--}}

@php

$id  = get_the_ID();

$tile = get_the_title(wp_get_post_parent_id($id));

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	$news = new WP_Query(array(

		'post_type' => 'cuu_sinh_vien',

		'post_status' => 'publish',

		'posts_per_page' => 6,

		'orderby' => 'date',

		'order' => 'DESC',

        'paged' => $paged

	));

@endphp

@extends('layouts.app')

@section('content')

<div class="news-template container">

        @include('layouts.breadcrumb')

        <div class="row">

            <div class="col-md-3 right-sidebar">@php dynamic_sidebar('cusinhvin') @endphp</div>

            <div class="news-template-content col-md-9">

                <div class="row">

                    <div class="col-md-12 single-img">

                        @php

                            if(has_post_thumbnail(get_the_ID())) {

                                $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                            }else {

                                $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                            }

                        @endphp

                        <img src="{!!crop_img(915,336,$img_item)!!}" alt="">

                    </div>

                    <div class="col-md-9 admin_content">

                        <div class="row">

                            @if( $news->have_posts() )

                                @while( $news->have_posts() )

                                    @php

                                        $news->the_post();

                                        if(has_post_thumbnail(get_the_ID())) {

                                            $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                                        } else {

                                            $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                                        }

                                        $url = get_permalink();

                                        $title = get_the_title();

                                        $excerpt = get_the_excerpt();

                                        $term = get_the_terms( get_the_ID(), 'category' )[0]->name;

                                    @endphp

                                    <div class="col-6 front-news-item template-news-item">

                                        <a href="{!!$url!!}" class="wrap">

                                            <div class="thumbnail"><img src="{!!crop_img(322,180,$img_item)!!}"></div>

                                            <h4 class="title">{!!$title!!}</h4>

                                            <p class="news-date">{!!date('F j, Y');!!}</p>

                                            <p class="excerpt">{!!wp_trim_words($excerpt, 18, '...')!!}</p>

                                        </a>

                                    </div>

                                @endwhile

                                @php wp_reset_query(); @endphp

                            @endif

                        </div>

                        @php wp_pagenavi(array( 'query' => $news));@endphp

                    </div>

                    <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>

                </div>

            </div>

            

        </div>

    </div>

@endsection