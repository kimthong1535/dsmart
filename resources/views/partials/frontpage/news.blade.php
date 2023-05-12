@php
	$news = new WP_Query(array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order' => 'DESC',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => 'tin-tuc'
			)
		)
	));
@endphp
<section id="front-news">
	<div class="container">
		<h3 class="section-title bl">{!!__('Tin mới nhất')!!}</h3>
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
					<div class="col-md-4 col-lg-3 front-news-item">
						<a href="{!!$url!!}" class="wrap">
							<div class="thumbnail"><img src="{!!crop_img(300,150,$img_item)!!}"></div>
							<div class="term">{!!$term!!}</div>
							<h4 class="title">{!!$title!!}</h4>
							<p class="excerpt">{!!wp_trim_words($excerpt, 18, '...')!!}</p>
						</a>
					</div>
				@endwhile
				@php wp_reset_query(); @endphp
			@endif
		</div>
	</div>
	<a href="#" class="section-view"><span>{!!__('Xem thêm tin tức')!!}</span><i class="fal fa-chevron-right"></i></a>
</section>