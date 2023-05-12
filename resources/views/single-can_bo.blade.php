@extends('layouts.app')
@section('content')
<div class="single-cadres container">
@include('layouts.breadcrumb')
    <div class="row">
        <div class="col-md-5">
            @php
                if(has_post_thumbnail(get_the_ID())) {
                    $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                } else {
                    $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                }
            @endphp
            <img src="{!!crop_img(494,743,$img_item)!!}" alt="">
            {{ the_content() }}
            <h3>{{ __('LĨNH VỰC NGHIÊN CỨU') }}</h3>
            <p>{!! get_field('research_side') !!}</p>
            <h3>{{ __('CÁC NGHIÊN CỨU QUAN TÂM') }}</h3>
            <p>{!! get_field('research_care') !!}</p>
        </div>
        <div class="col-md-7">
            <h3 class="cadres-intro">{{ __('GIỚI THIỆU') }}</h3>
            <p>{!! get_field('introduction') !!}</p>
            <h3>{{ __('CÁC CÔNG TRÌNH KHOA HỌC TIÊU BIỂU') }}</h3>
            <p>{!! get_field('scientific_works') !!}</p>
            <h3>{{ __('GIẢNG DẠY') }}</h3>
            <p>{!! get_field('teaching') !!}</p>
        </div>
    </div>
</div>   
@endsection
@php set_postview(get_the_ID()); @endphp