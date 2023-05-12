<section id="video">
    <div class="container">
        <h3 class="section-title bl">{{ get_field('video_title') }}</h3>	
            <div class="video-content row">
                <?php if( have_rows('video_content') ): ?>
                    <?php while( have_rows('video_content') ): the_row(); 
                        $url = get_sub_field('video_youtube');
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);
                        echo '<div class="col-12 col-md-4"><iframe src="https://www.youtube.com/embed/'.$matches[1].'?rel=0" title="111" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>';
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
    </div>
    <a href="#" class="section-view"><span>{!!__('Xem thêm video')!!}</span><i class="fal fa-chevron-right"></i></a>
</section>