{{--
  Template Name: Tuyển dụng
--}}
@php
$recruitment = new WP_Query
(array( 'post_type' => 'tuyen-dung',
'post_status' => 'publish',
'posts_per_page' => 8,
'orderby' => 'date',
'order' => 'DESC',
'tax_query'
=> array( array(
'taxonomy' => 'vi-tri',
'field' => 'slug',
'terms' => 'vi-tri-dang-tuyen-dung'
) ) ));
$recruitments = new WP_Query
(array( 'post_type' => 'tuyen-dung',
'post_status' => 'publish',
'posts_per_page' => 8,
'orderby' => 'date',
'order' => 'DESC',
'tax_query'
=> array( array(
'taxonomy' => 'vi-tri',
'field' => 'slug',
'terms' => 'vi-tri-khac'
) ) ));
$recruitmentpost = new WP_Query
(array( 'post_type' => 'tuyen-dung',
'post_status' => 'publish',
'orderby' => 'ID',
'order' => 'DESC'
));
@endphp
@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body" style="padding-top: 56px;">
    <div class="w-100 float-left">
      <div class="container content content_wp not-fixed body-content" id="content">
        <div id="app" class="page-wrap album-wrap recruitment  video-wrap employment-wrap">
          <div class="page-title-head">
            <strong class="font-playfair">Tuyển dụng</strong>
            <p class="font-sfui">D.CHIC</p>
          </div>
          <ul class="row album-filter">
            <li class="">Vị trí đang tuyển dụng</li>
          </ul>
          <div class="row product-content video-content list-item-div">
            <div id="employment-current-wrap" class="wrap employment-wrap w-100 float-left" style="">
              @if( $recruitment->have_posts() )
              @while( $recruitment->have_posts() )
              @php $recruitment->the_post();
              if(has_post_thumbnail(get_the_ID())) {
              $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
              } else {
              $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
              }
              $url = get_permalink();
              $title = get_the_title();
              @endphp
              <div class="col-sm-4 col-md-3 product-item video-item item-div float-left js-show-modal " style="height: 259px;">
                <a href="javascript:void(0)" class="product-thumb video-thumb ">
                  <div class="product-thumbnail-wrap video-thumbnail-wrap">
                    <div>
                      <img src="{!!$img_item!!}" alt="{!!$title!!}" title="{!!$title!!}">
                    </div>
                  </div>
                  <div class="video-btn-play">
                    <i aria-hidden="true" class="fa fa-search-plus"></i>
                  </div>
                </a>
                <h4 class="product-name video-title">
                  <a href="javascript:void(0);">{!!$title!!} </a>
                </h4>
              </div> @endwhile @php wp_reset_query(); @endphp @endif
            </div>
          </div>
          <ul class="row album-filter">
            <li class="">Vị trí khác</li>
          </ul>
          <div class="row product-content video-content list-item-div">
            <div id="employment-other-wrap" class="wrap employment-wrap w-100 float-left" style="">
              @if( $recruitments->have_posts() )
              @while( $recruitments->have_posts() )
              @php $recruitments->the_post();
              if(has_post_thumbnail(get_the_ID())) {
              $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
              } else {
              $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
              }
              $url = get_permalink();
              $title = get_the_title();
              @endphp
              <div class="col-sm-4 col-md-3 product-item video-item item-div float-left js-show-modal" style="height: 259px;">
                <a href="javascript:void(0) " class="product-thumb video-thumb ">
                  <div class="product-thumbnail-wrap video-thumbnail-wrap">
                    <div>
                      <img src="{!!$img_item!!}" alt="{!!$title!!}" title="{!!$title!!}">
                    </div>
                  </div>
                  <div class="video-btn-play">
                    <i class="fa fa-search-plus"></i>
                  </div>
                </a>
                <h4 class="product-name video-title">
                  <a href="javascript:void(0);"> {!!$title!!} </a>
                </h4>
              </div> @endwhile @php wp_reset_query(); @endphp @endif
            </div>
          </div>
          <!---->
        </div>
      </div>
    </div>
  </div>
  <!--End Body-->
</div>
<!-- Modal -->
<div id="modal-recruitment">
  <div aria-expanded="true" data-modal="employment-player" class="v--modal-overlay" id="employment-player">
    <div class="v--modal-background-click">
      <div class="v--modal-top-right"></div>
      <div class="v--modal-box v--modal">
        <div id="modal-header" class="modal-header">
          <h4>Thông tin tuyển dụng</h4>
        </div>
       
        <div class="modal-body">
        @if( $recruitmentpost->have_posts() )
        @while( $recruitmentpost->have_posts() )
        @php $recruitmentpost->the_post();
        if(has_post_thumbnail(get_the_ID())) {
        $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
        } else {
        $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
        }
        $url = get_permalink();
        $title = get_the_title();
        @endphp
          {!!the_content()!!}
        @endwhile @php wp_reset_query(); @endphp @endif
        </div>
       
        <i class="fa-regular fa-xmark" id="close"></i>
        <!---->
      </div>
    </div>
  </div>

</div>
<!-- End Modal -->




<!-- JS -->
<script>

</script>
@endsection