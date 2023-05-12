<?php

/**
 * Theme setup.
 */
namespace App;
use function Roots\bundle;

/**
 * include files
*/
include('inc/BFI_Thumb.php');
include('inc/theme-option.php');
include('inc/shortcode.php');
include('inc/theme-ajax.php');
include('inc/woocom.php');

add_action('wp_enqueue_scripts', function () {
    // Deregister WordPress jQuery
    wp_deregister_script( 'jquery' );
    // Load CDN
    wp_register_script( 'jquery', '//code.jquery.com/jquery-3.6.0.min.js', null, '3.6.0', false );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css',false, null);
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css',false, null);
    wp_enqueue_style( 'reset', get_template_directory_uri().'/resources/styles/reset.css',false, null);
    wp_enqueue_style( 'main', get_template_directory_uri().'/resources/styles/main.css',false, null);
    wp_enqueue_style( 'app-min', get_template_directory_uri().'/resources/styles/app.min.css',false, null);
    wp_enqueue_style( 'plus', get_template_directory_uri().'/resources/styles/plus.css' );
    wp_enqueue_style( 'plusThong', get_template_directory_uri().'/resources/styles/plusThong.css' );
    wp_enqueue_style( 'plusVy', get_template_directory_uri().'/resources/styles/plusVy.css' );
    // wp_enqueue_style( 'sub-menu', get_template_directory_uri().'/resources/styles/sub-menu.css' );
    wp_enqueue_style( 'general', get_template_directory_uri().'/resources/styles/general.css' );
    wp_enqueue_style( 'reponsive', get_template_directory_uri().'/resources/styles/reponsive.css' );
    wp_enqueue_style( 'reponsiveThong', get_template_directory_uri().'/resources/styles/reponsiveThong.css' );
    wp_enqueue_script('main', get_template_directory_uri().'/resources/scripts/main.js' );
    // wp_enqueue_script('site', get_template_directory_uri().'/resources/scripts/site.js' );
    // wp_enqueue_script('san-pham', get_template_directory_uri().'/resources/scripts/san-pham.js' );
    wp_enqueue_script('fansi.prototype', get_template_directory_uri().'/resources/scripts/fansi.prototype.js' );
    wp_enqueue_script('simply-toast', get_template_directory_uri().'/resources/scripts/simply-toast.min.js' );
    wp_enqueue_script('jquery.mousewheel', get_template_directory_uri().'/resources/scripts/jquery.mousewheel.min.js' );
    wp_enqueue_script('lightgallery-all', get_template_directory_uri().'/resources/scripts/lightgallery-all.min.js' );
    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'menu_news' => __('Menu Tin Tuc', 'sage'),
        'menu_products' => __('Menu San Pham', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

//funtion crop image
if( !function_exists('crop_img') ){
    if ( !function_exists('crop_img') ){
        function crop_img($w, $h, $url_img){
            $params = array( 'width' => $w, 'height' => $h);
            return bfi_thumb($url_img, $params );
        }
    }
}
//set view number
if ( !function_exists('set_view') ){
    function set_view($postId) {
        $count_key = 'view_number';
        $count = get_post_meta($postId, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postId, $count_key);
            add_post_meta($postId, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postId, $count_key, $count);
        }
    }
}
//get view number
if( !function_exists('get_view') ){
    function get_view($post_id){
        $count_key = 'view_number';
        $count = get_post_meta($post_id, $count_key, true);
        if($count==''){
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
            return "0 lượt xem";
        }
        return $count.' lượt xem';
    }
}