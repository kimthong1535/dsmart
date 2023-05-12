<div id="paper">
  <div class="max-width-wp">
    <div class="col-md-12 col-xs-12 paper-title">
      <img width="100%" alt="logo-home" src="{{ get_field('paper_logo') }}">
    </div>
    <div class="col-md-12 col-xs-12 paper-title">
      <h5></h5>
    </div>
    <div class="row" id="content-news">
      <div class="col-md-6 col-xs-12 row paper-first-column">
        <div class="col-md-6 col-xs-12 item">
          <a href="/shop">
            <img alt="TẶNG NGAY 950.000VNĐ HOẶC 01 QUẦN ÁO DÀI KHI MUA ÁO DÀI" src="{{ get_field('left_image')}}">
          </a>
        </div>
        <div class="col-md-6 col-xs-12 item first-column-title">
          <a href="/shop">
            <h5>{{ get_field('left_title')}}</h5>
            <p>{!! get_field('left_desc')!!}</p>
            <h6> Xem thêm <span class="border-read-more2"></span>
            </h6>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 row paper-second-column">
      @if(have_rows('right_column')) 
        @while(have_rows('right_column')) 
          @php the_row(); 
          @endphp
          <div class="col album col-md-6">
          <div class="item">
            <a href="/shop">
              <img alt="BEST DRESS(ED) SEASON" src="{{ get_sub_field('right_image') }}" style="width: 401px; height: 401px;">
            </a>
            <div class="album-title">
              <h5>{{ get_sub_field('right_title') }}</h5>
              <h6>
                <a href="/shop">Xem thêm <span class="border-read-more2"></span>
                </a>
              </h6>
            </div>
          </div>
        </div>
        @endwhile 
      @endif 
      </div>
    </div>
    <div class="col-md-12 col-xs-12 read-more"></div>
  </div>
</div>