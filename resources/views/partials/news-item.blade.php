@php
    if(has_post_thumbnail(get_the_ID())) {
        $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    }else {
        $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
    }
    $term = get_the_terms( get_the_ID(), 'category' )[0]->name;
@endphp
<div class="col-md-6 front-news-item template-news-item item-news">
    <a href="{{ get_permalink() }}" class="thumbnail"><img src="{{ crop_img(322,180,$img_item) }}"></a>
    <h3 class="title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h3>
    <p class="news-date">{{ date() }}</p>
    <div class="excerpt">{!! wp_trim_words( get_the_excerpt(), 18, '...') !!}</div>
</div>