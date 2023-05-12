@php
	$events = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 10,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC'
	));
@endphp
<section id="front-event" style="background-image: url( {!!get_field('event_background')!!} ); background-size: cover; background-position: 50% 50%;">
	<div class="container">
		<h3 class="section-title wt">{!!__('Sự kiện mới nhất')!!}</h3>
		<ul id="events">
			@if( $events->have_posts() )
				@while( $events->have_posts() )
					@php 
						$events->the_post(); 
						if(has_post_thumbnail(get_the_ID())) {
					        $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
					    } else {
					        $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
					    }
					@endphp
					<li class="event">
						<a href="{!!get_permalink()!!}">
							<div class="thumbnail"><img src="{!!crop_img(300,150,$img_item)!!}"></div>
							<div class="time">
								<span class="date">{!!get_the_date('d')!!}</span>
								<span class="month">{!!get_the_date('\T\H m')!!}</span>
							</div>
							<h4 class="title">{!!get_the_title()!!}</h4>
							<div class="excerpt">{!!get_the_excerpt()!!}</div>
						</a>
					</li>
				@endwhile
				@php wp_reset_query(); @endphp
			@endif
		</ul>
	</div>
</section>