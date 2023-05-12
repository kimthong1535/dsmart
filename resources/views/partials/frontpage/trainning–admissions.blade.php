
<section class="admissions container">
    <h3 class="section-title bl">
        {!!get_field('title')!!}
    </h3>
    {!!get_field('content')!!}
		
    <div class="container">
        <ul class="front_admissions">
        <?php 
        $term3 = get_field('front_admissions');
            foreach ( $term3 as $post ){
                $id = $post->ID;
                if(has_post_thumbnail($id)) {
                    $img_item = wp_get_attachment_url(get_post_thumbnail_id($id));
                } else {
                    $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                } 
                $url = $post->guid;
                $title = $post->post_title;
                $excerpt = $post->post_content;
                ?>
                    <div class="admissions-desc">
                        <div class="thumbnail"><a href="{!!$url!!}" class="wrap"><img src="{!!crop_img(300,270,$img_item)!!}"></a></div>
                        <div class="admissions-content">
                            <h4 class="title">{!!$title!!}</h4>
                            <p class="excerpt">{!!wp_trim_words($excerpt, 40, '...')!!}</p>
                        </div>
                    </div>
            <?php } ?>
        </ul>
    </div>
</section>