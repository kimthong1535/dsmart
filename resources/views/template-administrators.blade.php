
{{--
    Template Name: Ban giám hiệu
--}}

@php
$id  = get_the_ID();
$tile = get_the_title(wp_get_post_parent_id($id));
@endphp
@extends('layouts.app')

@section('content')
    <div class="admin-template container">
        @include('layouts.breadcrumb')
        <div class="row">
            <div class="col-md-3">
                <h3>{!!$tile!!}</h3>
                <ul class="menu-left left-sidebar">
                    @if (has_nav_menu('nav_menu'))
                        {!! wp_nav_menu(['theme_location' => 'nav_menu', 'menu_class' => 'nav1']) !!}
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 single-img">
                        @php
                            if(has_post_thumbnail(get_the_ID())) {
                                $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                            }else {
                                $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                            }
                        @endphp
                        <img src="{!!crop_img(915,336,$img_item)!!}" alt="">
                    </div>
                    <div class="col-md-9 admin_content">
                    <?php global $post;
                    if ( $post->post_parent ) { ?>
                        <a class="category-title" href="<?php echo get_permalink(); ?>" >
                        <?php echo get_the_title( $post->post_parent ); ?>
                            </a>
                        <?php } ?>
                        <div class="template-title"><h4>{!!the_title();!!}</h4></div>
                        <div class="date-update"><p>{{ __('Cập nhật lần cuối:') }}</p>{!!date('d-m-y H:i');!!}</div>
                        <?php if(have_rows('admin_info')) {
                            while (have_rows('admin_info')) {
                                the_row();
                                $nhiem_ky = get_sub_field('admin_term');
                                $anh_lanh_dao = get_sub_field('main_admin_image');
                                ?>
                                <?php if ( $nhiem_ky != "" ) { ?>
                                <h3 class="title-con">
                                    {!!$nhiem_ky!!}
                                </h3>
                                <?php } ?>
                                <div class="row">
                                        <div class="box-content large-4">
                                            <div class="box-image">
                                                <img src="{!!crop_img(206,248,$anh_lanh_dao)!!}" alt="">
                                            </div>
                                            <div class="box-text" style="padding:15px 10px 15px 10px;">
                                                <a href="" class="admin-name">{!!get_sub_field('main_admin_name')!!}</a>
                                                <hr>
                                                <a href="" class="admin-position">{!!get_sub_field('main_admin_position')!!}</a>
                                            </div>
                                        </div>
                                </div>
                               <div class="row">
                                    <?php if(have_rows('support_admin_info')) {
                                            while (have_rows('support_admin_info')) {
                                                the_row();
                                                $anh_pld = get_sub_field('support_admin_image');
                                                ?>
                                                <div class="box-content medium-4 small-12 large-4">
                                                    <div class="box-image">
                                                        <img src="{!!crop_img(206,248,$anh_pld)!!}" alt="">
                                                    </div>
                                                    <div class="box-text" style="padding:15px 10px 15px 10px;">
                                                        <a href="" class="admin-name">{!!get_sub_field('support_admin_name')!!}</a>
                                                        <hr>
                                                        <a href="" class="admin-position">{!!get_sub_field('support_admin_position')!!}</a>
                                                    </div>
                                                </div>
                                            <?php }   
                                        }?>
                               </div>
                            <?php }   
                        }?>
                    </div>
                <div class="col-md-3 sidebar right-sidebar">@php dynamic_sidebar('tinxemnhiu') @endphp</div>
            </div>
        </div>
    </div>
@endsection
