@php
    $post_term = get_the_terms( get_the_ID(), 'category')[0];
    $left_sidebar = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
        'tax_query' => array(array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $post_term->slug
        ))
    ));
@endphp
<div class="left-sidebar right-sidebar">
    <h3>{{ $post_term->name }}</h3>
    @php
        if($left_sidebar->have_posts()) {
            @endphp <ul> @php
                while ($left_sidebar->have_posts()) {
                    $left_sidebar->the_post();
                    @endphp
                        <li><a href="{!!get_permalink()!!}">{!!the_title()!!}</a></li>
                    @php
                }
                @endphp
            </ul> 
            @php wp_reset_query(); 
        }
    @endphp
</div>