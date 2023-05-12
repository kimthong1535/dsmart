@php
	$news = new WP_Query(array(
	'post_type' => 'bo-suu-tap',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC'
 ));
@endphp



@extends('layouts.app') 
@section('content')
<div class="row" id="begin-body" style="padding-top: 56px;">
    <div id="app" class="page-wrap album-wrap album-detail-wrap w-100 float-left">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12" style="margin: 0px auto;">
        <div class="page-title-head">
          <strong>
            <?php $post = get_queried_object();
            $postType = get_post_type_object(get_post_type($post));
            if ($postType) {
                echo esc_html($postType->labels->singular_name); } ?>
          </strong>
          <h2>{{ the_title() }}</h2>
          <p class="subtitle-time" style="display: none;">
            <i class="fa fa-clock"></i> 11:17 29/03/2023
          </p>
        </div>
        <div class="album-des">
          <h3 class="col-xs-12 deltai-title">{!! the_content()!!}</h3>
        </div>
      </div>
      <div class="col-12 float-left v-gallery gallery-album">
            <?php 
              $images = get_field('gallery');
              if( $images ): ?>
              <ul id="light-gallery" class="row">
                  <?php foreach( $images as $image ):  ?>
                      <li class="col-3 gallery-item" data-src="<?php echo $image; ?>">
                          <a href="#" class="img-responsive"><img src="<?php echo $image; ?>" /></a>
                      </li>
                  <?php endforeach; ?>
                    </ul>
            <?php endif; ?>
      </div>
    </div>

    

    <div class="w-100 bg-more-albums" style="background-image: url(<?php echo get_stylesheet_directory_uri() .'/resources/images/bg-more-stories.png'?>);">
      <div class="col-lg-9 col-md-9 col-sm-12 col-12 " style="margin: 0 auto;">
          <div class="page-wrap album-wrap">  
              <ul class="row album-filter">
                  <li class="">Bộ sưu tập mới</li>
              </ul>
              <ul class="row list-album list-item-div mt-2 mb-5">
                @if( $news->have_posts() )
                  @while( $news->have_posts() )
                    @php
                      $news->the_post();
                      $url = get_permalink();
                      $title = get_the_title();
                    @endphp
                      <li class="col- col-sm-4 col-md-4 item-div float-left col-4  pl-1 pr-1 more-albums">
                          <a href="{!! $url !!}">
                              <div class="items-thumb col-md-12 col-sm-12 pr-0 float-left pl-sm-0">
                                  <div class="col-12 float-left p-0">
                                      <div class="item-thumb item-thumb-first">
                                          <div class="item-thumb-abs">
                                            @php
                                              if(has_post_thumbnail(get_the_ID())) {
                                                  $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                                              }else {
                                                  $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                                              }
                                            @endphp
                                              <img src="{!! $img_item !!}">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-12 detail-title-ambull col-sm-12 float-left pr-0 pl-0">
                                  <div class="col-xs-12 album-info p-0">
                                      <div class="col-xs-12 album-info">
                                          <strong class="w-100 float-left mb-1 mt-md-2 mt-2 mb-md-2 mb-1">{!! $title !!}</strong>
                                      </div>
                                  </div>
                              </div>
                          </a>
                      </li>  
                  @endwhile
                    @php wp_reset_query(); @endphp
                @endif 
              </ul>
          </div>
      </div>
  </div>

  </div>
  @endsection
{{-- 
  <script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#light-gallery").lightGallery();
    });
</script> --}}
