<?php 
function search_loading(){
    $value_bo_mon = $_REQUEST['value_bo_mon'];
    $value_linh_vuc = $_REQUEST['value_linh_vuc'];
    $value_input = $_REQUEST['value_input'];
$tax_query = array(
    'relation' => 'AND'
);

if( $value_bo_mon != "" ) {
    $tax_query[] = array(
        'taxonomy' => 'bo_mon_trung_tam',
        'field' => 'slug',
        'terms' => $value_bo_mon 
    );
}
if( $value_linh_vuc != "" ) {
    $tax_query[] = array(
        'taxonomy' => 'linh_vuc_nghien_cuu',
        'field' => 'slug',
        'terms' => $value_linh_vuc 
    );
}
$news = new WP_Query(array(
    'post_type' => 'can_bo',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    's' => $value_input,
    'tax_query' => $tax_query,
)); 
?>
<?php

ob_start();

    if( $news->have_posts() ){
    while( $news->have_posts() ){
            $news->the_post();
            if(has_post_thumbnail(get_the_ID())) {
                $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            } else {
                $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
            }
            $url = get_permalink();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
?>
        <div class="article">
            <a href="#"><div class="article-img"><img src="<?php echo crop_img(210,315,$img_item) ?>"></div></a>
            <a href="#"><h4 class="title"><?php echo $title?></h4></a> 
        </div>
    <?php
        }
    } 
    
    $return = ob_get_contents();
    ob_end_clean();

    echo json_encode(array(
        'content' => $return
    ));

    exit;
}
    add_action('wp_ajax_search_loading','search_loading');
    add_action('wp_ajax_nopriv_search_loading','search_loading');


?>