@php $frontpage_id = get_option('page_on_front'); @endphp
<footer class="footer-widgets" style="background-image: url({{ get_field('footer_background', $frontpage_id) }})">
  <div class="container footer-widget">
    <div class="row">
      <div class="sidebar-column col-md-3">@php dynamic_sidebar('footer-1') @endphp</div>
      <div class="sidebar-column col-md-3">@php dynamic_sidebar('footer-2') @endphp</div>
      <div class="sidebar-column col-md-3">@php dynamic_sidebar('footer-3') @endphp</div>
      <div class="sidebar-column col-md-3">
        @php dynamic_sidebar('footer-4') @endphp
        <?php echo do_shortcode('[show_socials_icon]') ?>
      </div>
      <div class="copyright">{!! $dsmart_option['copyright'] !!}</div>
    </div>
  </div>
</footer>
@if ( wp_is_mobile())
  <div class="menu-mobi">
    <div class="mid">
      @php
        wp_nav_menu(array(
        'theme_location' => 'menu-mobi',
        'container' => 'nav',
        'depth' => 5,
        'menu_class' => 'menu',
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'container_class' => 'main-nav-mobi'
      ));
      @endphp
    </div>
    <div class="bottom">
      <div class="language-search">
        <div class="language">{!! do_shortcode('[wpml_language_selector_widget]') !!}</div>
        @if( $my_current_lang == 'vi')
            <form action="{{ site_url() }}" method="" name="frm2" class="frm_timkiem">
                <input type="text" name="s" id="name_tk" class="input" placeholder="{{ __('Tìm kiếm..') }}" value="{{ $s }}">
                <button type="submit" value="" id="btn" class="nut_tim"><i class="fas fa-search"></i></button>
            </form>
        @else
        <form action="{{ site_url( '/en/' ) }}" method="" name="frm2" class="frm_timkiem">
            <input type="text" name="s" id="name_tk" class="input" placeholder="{{ __('Tìm kiếm..') }}" value="{{ $s }}">
            <button type="submit" value="" id="btn" class="nut_tim"><i class="fas fa-search"></i></button>
        </form>
        @endif
    </div>
    </div>
  </div>
@endif
  <div id="overlay"></div>