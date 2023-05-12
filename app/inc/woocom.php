
<?php
global $product;
remove_action('woocommerce_before_single_product','woocommerce_output_all_notices',10);
add_action('woocommerce_before_single_product','woocommerce_before_single_product_add_container',1);
function woocommerce_before_single_product_add_container(){
    echo '<div class="container">';
}
add_action('woocommerce_after_single_product','woocommerce_after_single_product_add_container',1);
function woocommerce_after_single_product_add_container(){
    echo '<div class="container">';
}

remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
// remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
add_action( 'after_setup_theme', 'my_remove_product_result_count', 99 );
function my_remove_product_result_count() { 
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
}
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 9;
  return $cols;
}