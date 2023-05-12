@php
	$news = new WP_Query(array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC'
	 ));
@endphp
@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<!--Begin body-->
	<div class="row" id="begin-body" style="padding-top: 56px;">
		<div class="w-100 float-left mt-md-4 mt-0">
			<div class="col-2 float-left hidden-xs">
				<div class="cate-articale w-100 float-left" id="categoryArticle">
					@if (has_nav_menu('menu_news'))
					<nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('menu_news') }}"> {!! wp_nav_menu(['theme_location' => 'menu_news', 'menu_class' => 'nav', 'echo' => false]) !!} </nav> @endif
				</div>
			</div>
			<div class="col-lg-10 float-left pl-0 pr-md-2 pr-0">
				<div class="article-page fullwidth not-fixed page-wrap article-wrap article-page-detail">
					<div class="article-detail w-100 float-left"> {!!the_content()!!} </div>
				</div>
			</div>
			<div class="col-12 float-left left pl-0 pr-0">
				<div class="col-md-6 col-12 pl-0 pr-0" style="margin:0 auto">
					<div class="text-center product-relative w-100 float-left pl-0 pr-0 pt-0  pb-0 ">
						<div class="w-100 float-left col-md-offset-2">
							<h3 class="article-newest">Bài viết mới nhất</h3>
						</div>
					</div>
					<div class="w-100 float-left product-content article-content list-item-div mb-5" tabindex="1" style="overflow: hidden; position: relative; outline: none;">
						<div class="wrap m-0 w-100 float-left" style="transition: transform 0ms ease-out 0s; transform: translate3d(0px, 0px, 0px);">
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
										<div class="col-4 float-left item-article">
											<a href="{!!$url!!}" class="product-thumb article-thumb">
												<div class="product-thumbnail-wrap article-thumbnail-wrap">
													<div>
														<img src="{!!$img_item!!}" alt="THÔNG BÁO LỊCH GIAO HÀNG ONLINE TẾT NGUYÊN ĐÁN 2023" title="THÔNG BÁO LỊCH GIAO HÀNG ONLINE TẾT NGUYÊN ĐÁN 2023">
													</div>
												</div>
											</a>
											<h4 class="product-name mt-1 w-100">
												<a href="{!!$url!!}">{!!$title!!}</a>
											</h4>
										</div>
								@endwhile
								@php wp_reset_query(); @endphp
							@endif
							<!-- <div class="col-4 float-left item-article"><a href="/tin-tuc/ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179.html" class="product-thumb article-thumb"><div class="product-thumbnail-wrap article-thumbnail-wrap"><div><img src="https://static.dchic.vn/uploads/media/2022/12/hien thi 2 3 ngang-996235044-768x512.jpg" alt="Áo Dài Việt và câu chuyện đằng sau đầy cuốn hút" title="Áo Dài Việt và câu chuyện đằng sau đầy cuốn hút"></div></div></a><h4 class="product-name mt-1 w-100"><a href="/tin-tuc/ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179.html">Áo Dài Việt và câu chuyện đằng sau đầy cuốn hút</a></h4></div><div class="col-4 float-left item-article"><a href="/tin-tuc/haute-couture-dchic-couture-6784555.html" class="product-thumb article-thumb"><div class="product-thumbnail-wrap article-thumbnail-wrap"><div><img src="https://static.dchic.vn/uploads/media/2022/10/blog anh hien thi 2 3-411865296-768x512.png" alt="Haute Couture - D.CHIC Couture" title="Haute Couture - D.CHIC Couture"></div></div></a><h4 class="product-name mt-1 w-100"><a href="/tin-tuc/haute-couture-dchic-couture-6784555.html">Haute Couture - D.CHIC Couture</a></h4></div> -->
						</div>
						<div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 8px; z-index: auto; cursor: default; position: absolute; top: 0px; right: 0px; display: none; height: 445px; opacity: 0;">
							<div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgba(0, 0, 0, 0.2); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div>
						</div>
						<div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 8px; z-index: auto; position: absolute; left: 0px; bottom: 0px; cursor: default; display: none; width: 951.5px; opacity: 0;">
							<div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgba(0, 0, 0, 0.2); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Body-->
</div> @endsection