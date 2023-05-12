<div class="primary-banner">
  <div>
    <div class="position-relative" style="width: 100%; display: inline-block;">
      <a href="/shop" alt="Banner 1" tabindex="0"> @php $img = has_post_thumbnail( get_the_ID() ) ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ) : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg'; @endphp <img class="img-desk" alt="Banner 1" src="{!!$img!!}">
      </a>
    </div>
  </div>
</div>