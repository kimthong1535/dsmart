<div class="max-width-wp">
  <div id="collection-newest" class="row slide-collection">
    @if(have_rows('collection_list')) 
      @while(have_rows('collection_list')) 
      @php the_row(); @endphp 
      <div class="classify">
        <span>{{ get_sub_field('classify_title') }}</span> {!! get_sub_field('classify_desc') !!}
      </div>
      <div class="col-md-3 col-xs-12 item" style="position:relative;">
        <a href="/shop" alt="1811960">
          <img class="img-desk" alt="1811960" src="{!! get_sub_field('collection_image') !!}">
        </a>
        <a href="/shop">
          <p style="text-align: center; margin-top: 15px;">{!! get_sub_field('collection_number') !!}</p>
        </a>
      </div> 
      @endwhile 
    @endif <p style="text-align: center;">
      <a class="button-view" style="font-size: 16px; padding: 12px 20px; color: #000; border-color: #000; margin-top: 0px;" href="/shop">SHOP NOW</a>
    </p>
  </div>