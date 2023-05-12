<section class="banner">
    @php $img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        $img_item = isset($img) ? $img : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
    @endphp
    <img src="{!!$img_item!!}" alt="">
    {{-- <div class="container desc">{!! the_content() !!}</div> --}}
    <div class="ban-cont">
        <h2>{{ get_field('banner_title') }}</h2>
        <div class="ban-cont-desc">{!! get_field('banner_description') !!}</div>
    </div>
</section>
    