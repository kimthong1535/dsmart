@php
    $post_term = get_the_terms( get_the_ID(), 'category')[0];
    $query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'post_status' => 'publish',
        'orderby' => 'meta_key',
        'order' => 'DESC',
        'meta_key' => 'view_number',
    ));
@endphp
<div class="textwidget">
     @if($query->have_posts())
        <ul> 
            @while ( $query->have_posts() )
                @php $query->the_post(); @endphp
                <li><a href="{{ get_permalink() }}">{{ get_the_title().'--'.get_post_meta(get_the_ID(),'view_number',true) }}</a></li>
            @endwhile
        </ul> 
        @php wp_reset_query(); @endphp
    @endif
</div>