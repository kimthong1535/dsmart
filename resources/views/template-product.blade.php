{{--



Template Name: Sản phẩm



--}}



@php

	$news = new WP_Query(array(

	'post_type' => 'product',

	'post_status' => 'publish',

	'posts_per_page' => 12,

	'orderby' => 'date',

	'order' => 'ASC' 

    ));

@endphp



@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <!--Begin body-->

  <div class="row" id="begin-body" style="padding-top: 56px;">

    <div class="wp-page w-100 float-left wp-page-product">

      <div class="header-product">

        <div class="sort-box product-sort mb-0">

          <div class="form-group form-inline mb-0" style="float:right;">

            <label for="product-filter">Sắp xếp </label>

            <div class="custom-select" id="menu-product-js">

              <select id="product-filter" class="form-control" onchange="LoadProductByFilter(this)" style="position: relative"></select>

              <div class="custom-select-item select-selected" >Mới nhất</div>

              <div class="select-items select-hide" onclick="return false;">

                <div class="custom-select-item" data-filter="sort" data-value="newest">

                  <span>Mới nhất</span>

                </div>

                <div class="custom-select-item" data-filter="sort" data-value="best_seller">

                  <span>Bán chạy</span>

                </div>

                <div class="custom-select-item" data-filter="sort" data-value="price_desc">

                  <span>Giá giảm dần</span>

                </div>

                <div class="custom-select-item" data-filter="sort" data-value="price_asc">

                  <span>Giá tăng dần</span>

                </div>

                <div class="custom-select-item select-sale" data-filter="sort" data-value="sale" onclick="return false;">

                  <span class="select-sale-text">Mức sale</span>

                  <ul>

                    <li>

                      <input type="checkbox" name="sale[]" value="50"> 50%

                    </li>

                    <li>

                      <input type="checkbox" name="sale[]" value="30"> 30%

                    </li>

                  </ul>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="wp-menu-product">

            @if (has_nav_menu('menu_products'))

            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('menu_products') }}"> {!! wp_nav_menu(['theme_location' => 'menu_products', 'menu_class' => 'nav', 'echo' => false]) !!} </nav> @endif

      </div>

      <div class="w-product">

        <div class="row product-content list-item-div" id="list-products">

        @if( $news->have_posts() )

            @while( $news->have_posts() )

                @php

                    $news->the_post();

                    if(has_post_thumbnail(get_the_ID())) {

                    $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));

                    } else {

                    $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                    }

                    $title = get_the_title();

                    wc_get_template_part( 'content', 'product' );

                @endphp

            @endwhile

            @php wp_reset_query(); @endphp

        @endif

          

        </div>

        <div class="row">

          <div class="col-12 text-center">

            <button class="btn btn-default btn-item-viewmore">Xem thêm</button>

          </div>

        </div>

      </div>

    </div>

    <!--Bản basic - đặt hàng thông thường-->

    <div class="modal fade bd-cart-modal-lg" tabindex="-1" role="dialog" aria-labelledby="cart-model" aria-hidden="true" id="modelCart">

      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

          <div>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">×</span>

            </button>

          </div>

          <div class="container-fluid">

            <div class="row">

              <div class="col-12">

                <div class="container">

                  <div class="row">

                    <div class="col-12 text-center">

                      <div class="title pt-md-3 pt-0 title-product-add">Sản phẩm đã được thêm vào giỏ hàng</div>

                      <div class="d-flex justify-content-center form-group info product-popup">

                        <div class="w-img-product-quick">

                          <img class="img-product-quick" src="">

                        </div>

                        <div class="pl-4 text-left d-flex align-items-center">

                          <div>

                            <strong class="name">Áo Dài Khuê Diễm Trâm An Nguyệt</strong>

                            <div>

                              <span class="circle color d-none" style="background-color: #000000"></span>

                              <span class="product-feature-size circle circle_border size d-none">

                                <span class="name">M</span>

                              </span>

                              <div class="color-name mr-3"></div>

                              <div class="size-name"></div>

                            </div>

                            <div class="info-product"></div>

                          </div>

                        </div>

                      </div>

                      <div class="text-center m-auto d-flex justify-content-center btn-end mt-md-3">

                        <div class="btn btn-dark mr-2 text-white rounded-0 cursor-pointer btn-action-product" data-dismiss="modal">Tiếp tục mua</div>

                        <div class="btn rounded-0 text-white cursor-pointer view-cart" style="background-color:#b99e69" onclick="window.location.href='/gio-hang'">Xem giỏ hàng</div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <div class="container-fluid pt-3 pb-4 mt-4 product-viewed" style="background-color:#f6f6f6">

            <div class="row">

              <div class="col-12 fix-Product-viewed">

                <h5 class="text-center pb-3 title-product-viewed">Sản phẩm đã xem</h5>

                <div class="d-flex justify-content-center viewed-container"></div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <!--Bản update - Không cho phép đặt hàng-->

  </div>

  <!--End Body-->

</div>

@endsection