<section id="client">
	<div class="container">
        <h3 class="section-title bl">{{ get_field('client_title') }}</h3>
        <div id="client-slick">
            @php 
                $news = new WP_Query(array(
                    'post_type' => 'client',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ))
            @endphp
            @if( $news->have_posts() )
                @while( $news->have_posts() )
                    @php
                        $news->the_post();
                        if(has_post_thumbnail(get_the_ID())) {
                            $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        } else {
                            $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                        }
                    @endphp
                    <div class="client-desc">
                        <div class="client-image"><a href="{{ get_permalink() }}" class="wrap"><img src="{{ crop_img(116,160,$img_item) }}"></a></div>
                        <div class="client-content">
                            <div class="p30">{!! the_content() !!}</div>
                            <strong>{{ the_title() }}</strong>
                            <p class="excerpt">{!! wp_trim_words( get_the_excerpt(), 18, '...') !!}</p>
                        </div>
                    </div>
                @endwhile
                @php wp_reset_query(); @endphp
            @endif
        </div>	
	</div>
</section>