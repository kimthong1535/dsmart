@php
	$news = new WP_Query(array(
		'post_type' => 'cuu_sinh_vien',
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'orderby' => 'date',
		'order' => 'DESC'
	));
@endphp
<section id="front-new">
	<div class="container front-alumani">
		<h3 class="section-title bl">{!!__('Cựu sinh viên')!!}</h3>
		<div class="front-new-list row">
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
						$post_type_obj = get_post_type_object( 'cuu_sinh_vien' );
					@endphp
					<div class="col-6 col-md-6 col-lg-3 front-news-item">
						<a href="{!!$url!!}" class="wrap">
							<div class="thumbnail"><img src="{!!crop_img(300,150,$img_item)!!}"></div>
							<div class="term">{!!$post_type_obj->labels->name!!}</div>
							<h4 class="title">{!!$title!!}</h4>
							<p class="excerpt">{!!wp_trim_words($excerpt, 18, '...')!!}</p>
						</a>
					</div>
				@endwhile
				@php wp_reset_query(); @endphp
			@endif
		</div>
	</div>
</section>