{{--
    Template Name: Hỏi đáp về tuyển sinh
--}}
@extends('layouts.app')
@section('content')
<div class="questions-template container">
        @include('layouts.breadcrumb')
        <div class="row">
            <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tuynsinh') @endphp</div>
            <div class="col-md-9 content">
                <div class="row">
                    <div class="col-12 thumb single-img">
                        @php
                            if(has_post_thumbnail(get_the_ID())) {
                                $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                            }else {
                                $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                            }
                        @endphp
                        <img src="{{ $img_item }}" alt="">
                    </div>
                    <div class="col-md-9 desc">
                        <div class="desc-con">{!!the_content()!!}</div>
                        <div class="con-frm">@php dynamic_sidebar('ngkngtuyn') @endphp</div>
                    </div>
                    <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>
                </div>
            </div>
            
        </div>
    </div>
@endsection