<?php
//show socials
add_shortcode('show_socials_icon','show_socials_icon');
function show_socials_icon(){
    global $dsmart_option; 
    ob_start();
    ?>
    <ul class="socials">
        <?php if( !empty($dsmart_option['facebook']) ): ?>
        <li class="facebook-icon"><a class="facebook" href="https://facebook.com/<?php echo $dsmart_option['facebook'] ?>" target="_blank">
            <i class="fab fa-facebook-f" aria-hidden="true"></i>
        </a></li>
        <?php endif; ?>
        
        <?php if( !empty($dsmart_option['twitter']) ): ?>
        <li><a class="twitter" href="https://twitter.com/<?php echo $dsmart_option['twitter'] ?>" target="_blank">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a></li>
        <?php endif; ?>
        <?php if( !empty($dsmart_option['youtube']) ): ?>
        <li class="youtube-icon"><a class="youtube" href="https://youtube.com/<?php echo $dsmart_option['youtube'] ?>" target="_blank">
            <i class="fab fa-youtube" aria-hidden="true"></i>
        </a></li>
        <?php endif; ?>
        <?php if( !empty($dsmart_option['google-plus']) ): ?>
        <li class="map-icon"><a class="google" href="https://twitter.com/<?php echo $dsmart_option['google-plus'] ?>" target="_blank">
            <i class="fal fa-map-marker-alt" aria-hidden="true"></i>
        </a></li>
        <?php endif; ?>
        <?php if( !empty($dsmart_option['instagram']) ): ?>
        <li><a class="instagram" href="https://instagram.com/<?php echo $dsmart_option['instagram'] ?>" target="_blank">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a></li>
        <?php endif; ?>
    </ul>
    <?php
    $list_icon = ob_get_contents();
    ob_end_clean();
    return $list_icon;
}
//news view
add_shortcode('news_view_more','news_view_more');
function news_view_more(){
    global $dsmart_option; 
    ob_start();
    $query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'post_status' => 'publish',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'meta_key' => 'view_number'
    ));
    if($query->have_posts()) {
        echo '<ul>';
            while ($query->have_posts()){ $query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    <p><i class="fas fa-eye"></i> <?= get_postview( get_the_ID() ) ?></p>
                </li>
            <?php }
        echo '</ul> ';
        wp_reset_query(); 
    }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}
//new newest
add_shortcode('new_newest_more','new_newest_more');
function new_newest_more(){
    global $dsmart_option; 
    ob_start();
    $query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ));
    if($query->have_posts()) {
        echo '<ul>';
            while ($query->have_posts()){ $query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                    <p><i class="fas fa-eye"></i> <?= get_postview( get_the_ID() ) ?></p>
                </li>
            <?php }
        echo '</ul> ';
        wp_reset_query(); 
    }
    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}