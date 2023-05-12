@extends('layouts.app')

@section('content')

<div class="single-su_kien container">

@include('layouts.breadcrumb')

    <div class="row dl-mb">

        <div class="col-md-9 col-full ">

            <div class="row desc dl-mb">

                <div class="col-md-6 col-full single-img">

                    @php $img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

                        $img_item = isset($img) ? $img : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                    @endphp

                    <img src="{!!$img_item!!}" alt="">

                </div>

                <div class="col-md-6 col-full">

                    <h2> {{ get_the_title() }}</h2>

                    <div class="date-update"><p>Cập nhật lần cuối:</p>{{ date('d-m-y H:i') }}</div>

                    <div class="event_info">

                        <p><strong>{{ __('Thời gian bắt đầu:') }}</strong>{!! get_field('event_time_begin') !!}</p>

                        <p><strong>{{ __('Thời gian kết thúc:') }}</strong>{{ get_field('event_time_end') }}</p>

                        <p><strong>{{ __('Địa điểm:') }}</strong>{{ get_field('event_place') }}</p>

                    </div>

                </div>

            </div>

            {{ the_content() }}

        </div>

        <div class="col-md-3 col-full sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>

    </div>

</div>   

@endsection

@php set_postview(get_the_ID()); @endphp