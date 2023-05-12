<div class="max-width-wp">
  <div class="row" id="our-store">
    <div class="col-md-12 col-xs-12 item">
      <h3>{!! get_field('store_title') !!}</h3>
    </div>
    <div class="col-md-12 col-xs-12 item">
      <h5>{!! get_field('store_desc') !!}</h5>
    </div>
    <div class="col-md-12 col-xs-12 item" style="display: flex; margin: auto;">
      <a href="/showroom">{!! get_field('store_location') !!} <span class="border-read-more2"></span>
      </a>
    </div>
    <div class="col-md-12 col-xs-12 item">
      <a href="http://dchiccouture.dchic.vn/">
        <img class="img-desk" alt="showroom" src="{!! get_field('store_image') !!}">
      </a>
    </div>
  </div>
</div>