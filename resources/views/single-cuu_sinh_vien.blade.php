@extends('layouts.app')
@section('content')
    <div class="single-page container">
    @include('layouts.breadcrumb')
        <div class="row">
            <div class="left-menu col-md-3"> 
            @php
                $post_term = get_the_terms( get_the_ID(), 'category')[0];
                $left_sidebar = new WP_Query(array(
                    'post_type' => 'cuu_sinh_vien',
                    'posts_per_page' => 10,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC'  
                ));
            @endphp
            <div class="left-sidebar right-sidebar">
                <h3>{{ $post_term->name }}</h3>
                @php
                    if($left_sidebar->have_posts()) {
                        @endphp <ul> @php
                            while ($left_sidebar->have_posts()) {
                                $left_sidebar->the_post();
                                @endphp
                                    <li><a href="{!!get_permalink()!!}">{!!the_title()!!}</a></li>
                                @php
                            }
                            @endphp
                        </ul> 
                        @php wp_reset_query(); 
                    }
                @endphp
            </div>
            </div>
            <div class="single-content col-md-9">
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
                    <div class="single-desc col-md-9">{!!the_content()!!}</div>
                    <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>
                </div>
            </div>
        </div>
    </div>
@endsection
@php set_postview(get_the_ID()); @endphp