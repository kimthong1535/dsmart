{{-- <section class="portfolio">

    <ul class="list-portfolio">

        <?php 

            // $args = array( 

            //     'post_type' => 'portfolio',

            //     'post_status'=> 'publish',

            //     'posts_per_page' => -1,

            //     'order' => 'ASC',

            //     'orderby' => 'date',

            // );

            // $the_query = new WP_Query( $args );

            // $count = 0;

            // if ( $the_query->have_posts() ) :

            //     while ( $the_query->have_posts() ) : $the_query->the_post();

            //     $count++;

            //     $cats = wp_get_post_terms(get_the_ID(),'categories_portfolio');

            //     $img = has_post_thumbnail( get_the_ID() ) ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ) : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                ?>

            <li class="{{ ( $count < 12 ) ? "show" : "" }}">

                <a href="{{ get_permalink(); }}"><img src="{{ $img; }}"></a>

                <div class="hover-show">

                    <h3><a href="{{ get_permalink() }}">{{ the_title(); }}</a>

                    @if( isset($cats) )

                    @php 

                        $arr = [];

                        foreach ($cats as $item) {

                         $arr[] = $item->name;

                        }

                    @endphp

                    <p class="portfolio-slug">{{ implode(",", $arr) }}</p>

                    @endif

                </div>

            </li>

            <?php 

        //     endwhile;

        // endif; 

        ?>

    </ul>

    <div class="portfolio_bottom"><i class="portfolio_icon"></i></div>

</section> --}}



<section class="portfolio">

    @php

$args = array( 

    'post_type' => 'portfolio',

    'post_status'=> 'publish',

    'posts_per_page' => -1,

    'order' => 'ASC',

    'orderby' => 'date',

);

$the_query = new WP_Query( $args );

@endphp

    <ul class="list-portfolio">

        <?php 

            $count = 0;

            if ( $the_query->have_posts() ) :

                while ( $the_query->have_posts() ) : $the_query->the_post();

                $count++;

                $cats = wp_get_post_terms(get_the_ID(),'categories_portfolio');

                $img = has_post_thumbnail( get_the_ID() ) ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) ) : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';

                ?>

            <?php 

            if ( $count == 6 ) { ?>

                <div class="n-67">

            <?php }

            if ( $count == 8 ) { ?>

                </div>

            <?php }  ?>

            <li class="{{ ( $count < 9 ) ? "show" : "" }} {{ ($count == 8) ? "pn-8" : "" }}">

                <a href="{{ get_permalink(); }}"><img src="{{ $img; }}"></a>

                <div class="hover-show">

                    <h3><a href="{{ get_permalink() }}">{{ the_title(); }}</a>

                    @if( isset($cats) )

                    @php 

                        $arr = [];

                        foreach ($cats as $item) {

                         $arr[] = $item->name;

                        }

                    @endphp

                    <p class="portfolio-slug">{{ implode(",", $arr) }}</p>

                    @endif

                </div>

            </li>

            <?php endwhile;

        wp_reset_query();

        endif; ?>

    </ul>

    

</section>