@php
$current = get_queried_object();
$news = new WP_Query(array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 10,
  'orderby' => 'date',
  'order' => 'DESC',
  'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $current->slug
			)
		) ));
@endphp
@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body" style="padding-top: 54.0938px;">
    <div class="w-100 float-left h-100 d-inline-block mt-4">
      <div class="article-detail row mr-md-0 mt-3">
        <div class="col-2 float-left hidden-xs">
          <div class="cate-articale w-100 float-left" id="categoryArticle">
            @if (has_nav_menu('menu_news'))
            <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('menu_news') }}">
              {!! wp_nav_menu(['theme_location' => 'menu_news', 'menu_class' => 'nav', 'echo' => false]) !!}
            </nav>
            @endif
          </div>
        </div>
        <div class="col-lg-10 float-left mb-3">
          <div class="wp-article-hl w-100 float-left mb-5">
            <div class="w-100 float-left">
              <p class="col-12 float-left p-hl pb-2">NỔI BẬT</p>
            </div>
            <div class="item-article-hl col-12 float-left mt-2">
              <div>
                <div class="w-100 float-left mb-3">
                  <a class="centered w-100 float-left" href="/tin-tuc/thong-bao-lich-giao-hang-online-tet-nguyen-dan-2023-4575029.html">
                    <img class="img-detail w-100 float-left" src="https://static.dchic.vn/uploads/media/2023/01/banner web mobile-109825508.jpg" style="max-width: 100%; overflow:hidden" alt="thong-bao-lich-giao-hang-online-tet-nguyen-dan-2023-4575029">
                  </a>
                </div>
                <div class="article-hl w-100 float-left">
                  <h2 class="w-100 float-left title-article mt-1 mb-2 mb-sm-1">THÔNG BÁO LỊCH GIAO HÀNG ONLINE TẾT NGUYÊN ĐÁN 2023</h2>
                  <p class="subtitle-time" style="line-height: 30px;">
                    <i class="far fa-clock"></i> 10:17 15/01/2023
                  </p>
                  <p class="article-des w-100 float-left mt-1 mb-3"> D.CHIC xin thông báo lịch làm việc của dịch vụ chuyển phát nhanh và lịch nhận các đơn hàng để đảm bảo khách hàng nhận được hàng trước Tết Nguyên Đán. </p>
                  <a href="/tin-tuc/thong-bao-lich-giao-hang-online-tet-nguyen-dan-2023-4575029.html" class="more-content float-left">XEM THÊM <span class="border-read-more"></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="article w-100 float-left">
            <div>
              <div id="itemContainer">
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
                        <div data-id="1161" class="col-lg-6 col-md-6 col-xs-12 col-sm-12 article-item float-left mb-4" style="margin-top: 20px; height: 740.766px; opacity: 1;">
                          <div class="featured-image w-100 float-left mb-lg-2 mb-md-2 mb-2">
                            <a href="/tin-tuc/ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179.html" class="centered w-100 float-left">
                              <img class="img-detail w-100 float-left" src="{!!$img_item!!}" style="max-width: 100%; overflow:hidden" alt="ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179">
                            </a>
                          </div>
                          <div class="detail w-100 float-left">
                            <h3 class="pt-2 pb-1">{!!$title!!} </h3>
                            <p class="subtitle-time mb-1">
                              <i class="far fa-clock"></i>
                              
                              {!!date('F j, Y');!!}
                            </p>
                            <p class="w-100 float-left">{!!$excerpt!!}</p>
                            <a href="{!!$url!!}" class="more-content float-left mt-3">
                              <span>XEM THÊM<span class="border-read-more"></span></span>
                            </a>
                          </div>
                        </div>
                    @endwhile
                    @php wp_reset_query(); @endphp
                @endif
              </div>
              @php wp_pagenavi(array( 'query' => $news));@endphp 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Body-->
</div>
@endsection