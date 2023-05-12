<section id="aboutus">
    <div class="container">
        <h3 class="section-title bl">{{ get_field('about_us_title') }}</h3>	
        <div class="about-us">
        <?php if(have_rows('about_us_content')) {
                while (have_rows('about_us_content')) {
                    the_row();
                    $heading = get_sub_field('heading');
                    $number = get_sub_field('number');
                    $desc = get_sub_field('desc');
                    $percent = get_sub_field('percent');
                    ?>
                    <div class="aboutus-desc">
                        <h5>{{ $heading }}</h5>
                        <div class="desc">
                            <span><strong class="count-number">{{ $number }}</strong><p class="percent">{{ $percent }}</p></span>
                            <p>{{ $desc }}</p>
                        </div>
                    </div>
                <?php }   
        }?>
        </div>
    </div>
</section>