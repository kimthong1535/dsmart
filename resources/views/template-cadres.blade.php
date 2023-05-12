{{--
    Template Name: Cán bộ
--}}

@extends('layouts.app')

@section('content')
<div class="template-cardes container">
    @include('layouts.breadcrumb')
    <?php 
        $taxonomyName1 = "bo_mon_trung_tam";
        $parent_terms_bo_mon = get_terms( $taxonomyName1, array( 'parent' => 0 ,'orderby' => 'DESC', 'hide_empty' => false, 'order' => 'date' ) );
        $taxonomyName2 = "linh_vuc_nghien_cuu";
        $parent_terms_linh_vuc = get_terms( $taxonomyName2, array( 'parent' => 0 ,'orderby' => 'DESC', 'hide_empty' => false, 'order' => 'date' ) );      
    ?>
    <form action="">
        <div class="row search">
            <div class="nav_search cadres">
                <select name="" id="">
                    <option hidden>{{ __('Tất cả bộ môn trung tâm')}}</option>
                    <?php foreach ( $parent_terms_bo_mon as $parent_term_bo_mon ) { ?>
                        <option slug="{!!$parent_term_bo_mon->slug!!}"><?php echo $parent_term_bo_mon->name ;?></option>
                    <?php } ?>
                </select>  
            </div>
            <div class="nav_search field">
                <select name="" id="">
                    <option hidden>{{ __('Tất cả Lĩnh vực nghiên cứu')}}</option>
                        <?php foreach ( $parent_terms_linh_vuc as $parent_term_linh_vuc ) { ?>
                            <option slug="{!!$parent_term_linh_vuc->slug!!}"><?php echo $parent_term_linh_vuc->name ;?></option>
                        <?php } ?>
                </select>       
            </div>
        <input type="text" name="cb" value="" placeholder="{{ __('Tên cán bộ')}}">
        <a href="#" class="submit-button">
            <i class="fas fa-search"></i>
        </a>
        </div>
    </form>
    <div id="post-list">
        <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $taxonomyName = "question";
            $parent_terms = get_terms( $taxonomyName, array( 'parent' => 0 ,'orderby' => 'DESC', 'hide_empty' => false, 'order' => 'date' ) );   
            $news = new WP_Query(array(
                'post_type' => 'can_bo',
                'post_status' => 'publish',
                'posts_per_page' => 25,
                'orderby' => 'date',
                'order' => 'DESC',
                'paged' => $paged,
            )); ?>
            <div class="row">
                @if( $news->have_posts() )
                    @while( $news->have_posts() )
                        @php
                            $news->the_post();
                            if(has_post_thumbnail(get_the_ID())) {
                                $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                            } else {
                                $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                            }
                            $url = get_permalink();
                            $title = get_the_title();
                            $excerpt = get_the_excerpt();
                        @endphp
                        <div class="article">
                            <a href="{{ $url }}"><div class="article-img"><img src="{!!crop_img(210,315,$img_item)!!}"></div></a>
                            <a href="{{ $url }}"><h4 class="title">{!!$title!!}</h4></a>
                        </div>
                    @endwhile
                    @php wp_reset_query();@endphp
                @endif  
            </div>  
            @php wp_pagenavi(array( 'query' => $news));@endphp
    </div>

</div>
@endsection