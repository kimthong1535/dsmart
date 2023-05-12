@php
    global $dsmart_option;
    $frontpage_id = get_option('page_on_front');
    $logo = $dsmart_option['logo'];
    $name1 = $dsmart_option['title-header1'];
    $name2 = $dsmart_option['title-header2'];
    $name1_en = $dsmart_option['title-header1-en'];
    $name2_en = $dsmart_option['title-header2-en'];
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $s = isset($_GET['s']) ? $_GET['s'] : '';
@endphp
@if (!is_front_page())
    @php $banner = get_field('banner',$frontpage_id) @endphp
@endif
<header class="site-header">
    <div class="container header-top">
        <div class="header-logo">
            <a class="logo" href="{!! home_url('/') !!}"><img src="{{ $logo['url'] }}"
                    alt="{{ get_bloginfo('name', 'display') }}" /></a>
        </div>
        @if( $my_current_lang == 'vi') 
            <div class="department-name">
                <h3 class="university-name">{{ $name1 }}</h3>
                <h3 class="">{{ $name2 }}</h3>
            </div>
        @else
            <div class="department-name">
                <h3 class="university-name">{{ $name1_en }}</h3>
                <h3 class="">{{ $name2_en }}</h3>
            </div>
        @endif
        <div class="row language-search">
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
    <div class="header-menu">
        <div class="menu-mb">
          <span class="icon-menu"><i class="fa fa-bars active" aria-hidden="true"></i></span>
        </div>
        <div class="container">
            <?php
            $count = 0;
            $taxonomy = 'category';
            $terms = get_terms($taxonomy, ['orderby' => 'slug', 'hide_empty' => false]);
            ?>
            <ul class="menu-parent">
                @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
                @endif
            </ul>
        </div>
    </div>
</header>