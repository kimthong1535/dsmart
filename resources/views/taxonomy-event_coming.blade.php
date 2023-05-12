@php
    $current = get_queried_object();
	$events = new WP_Query(array(
		'post_type' => 'su_kien',
		'posts_per_page' => 12,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
        'tax_query' => array(
			array(
				'taxonomy' => 'event_coming',
				'field' => 'slug',
				'terms' => $current->slug
			)
		)    
	));
@endphp
@extends('layouts.app')
@section('content')
<div class="template-event container">
@include('layouts.breadcrumb')
    <div class="row">
        <div class="event-list col-md-9">
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
                    <div class="event">
                        <a href="{!!get_permalink()!!}">
                            <div class="thumbnail"><img src="{!!crop_img(300,150,$img_item)!!}"></div>
                            <div class="time">
                                <span class="date">{{ get_the_date('d') }}</span>
                                <span class="month">{{ get_the_date('\T\H m') }}</span>
                            </div>
                            <h4 class="title">{!!get_the_title()!!}</h4>       
                            <div class="excerpt"><div class="is-divider"></div>
                                <p class="update">{{ __('Cập nhật lần cuối:') }} {{ date('d-m-y H:i') }}</p>
                                <div class="event-desc"><p>{{ __('Thời gian:') }} {{ get_field('event_time_begin') }}</p><p>{{ __('Địa điểm:') }} {{ get_field('event_place') }}</p></div>
                            </div>
                        </a>
                    </div>
                @endwhile
                @php wp_reset_query(); @endphp
            @endif
        @php wp_pagenavi(array( 'query' => $events));@endphp 
        </div>
        <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>           
    </div> 
</div>
@endsection