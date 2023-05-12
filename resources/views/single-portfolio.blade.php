@php
global $post;
$current_id = $post->ID;
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="portdetail">
            <div class="port-cat">
                <?php 
                $categories = get_the_terms( get_the_ID(), 'categories_portfolio' );
                foreach ( $categories as $key => $category ) {
                    if( $category->parent != 0 ){ 
                        $term_link = get_term_link( $category->slug, 'categories_portfolio' )
                        ?>
                        <a href="{{ $term_link }}">{{$category->name}}</a>
                    <?php }
                }
                ?>
            </div>
            <div class="port-name">{{ the_title() }}</div>
            <div class="port-img">{{ the_content() }}</div>
            <div class="trans-port">
                <div class="trans-icon"></div>
            </div>
        </div>
        <div class="">
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        if ( is_a( $prev_post , 'WP_Post' ) ) : ?>
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo "Prev"; ?></a>
        <?php endif; ?>
        <?php if ( is_a( $next_post , 'WP_Post' ) ) : ?>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo "Next"; ?></a>
        <?php endif; ?>
        </div>
    </div>
@endsection
