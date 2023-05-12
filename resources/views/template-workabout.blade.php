{{--

Template Name: Work about

--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="template-work-about">
            <div class="about-works">
                <div class="ab-title">
                    <h3 class='num-order'>01</h3>
                    <h3 class='ab-heading'> {{ get_field('title_press')}}</h3>
                    {!! get_field('desc_press') !!}
                </div>
                <div class="about-desc">
                    @if(have_rows('press_works'))
                        @while(have_rows('press_works'))
                            @php
                                the_row();
                            @endphp
                            <div class="classify">
                                <span>{{ get_sub_field('classify_title') }}</span>
                                {!! get_sub_field('classify_desc') !!}
                            </div>
                        @endwhile
                    @endif 
                </div>
                <img src="{{ get_field('sec01_banner')}}" alt="">
            </div>
        </div>
        <div class="template-work-about">
            <div class="about-works">
                <div class="ab-title">
                    <h3 class='num-order'>02</h3>
                    <h3 class='ab-heading'> {{ get_field('title_digital')}}</h3>
                    {!! get_field('desc_digital') !!}
                </div>
                <div class="about-desc">
                    @if(have_rows('digital_works'))
                        @while(have_rows('digital_works'))
                            @php
                                the_row();
                            @endphp
                            <div class="classify">
                                <span>{{ get_sub_field('classify_title') }}</span>
                                {!! get_sub_field('classify_desc') !!}
                            </div>
                        @endwhile
                    @endif 
                </div>
                <img src="{{ get_field('sec02_banner')}}" alt="">
            </div>
        </div>
        <div class="template-work-about">
            <div class="about-works">
                <div class="ab-title">
                    <h3 class='num-order'>03</h3>
                    <h3 class='ab-heading'> {{ get_field('title_video')}}</h3>
                    {!! get_field('desc_video') !!}
                </div>
                <div class="about-desc">
                    @if(have_rows('video'))
                        @while(have_rows('video'))
                            @php
                                the_row();
                            @endphp
                            <div class="classify">
                                <span>{{ get_sub_field('classify_title') }}</span>
                                {!! get_sub_field('classify_desc') !!}
                            </div>
                        @endwhile
                    @endif 
                </div>
                <img src="{{ get_field('sec03_banner')}}" alt="">
            </div>
        </div>
        <div class="template-work-about">
            <div class="about-works">
                <div class="ab-title">
                    <h3 class='num-order'>04</h3>
                    <h3 class='ab-heading'> {{ get_field('title_management')}}</h3>
                    {!! get_field('desc_management') !!}
                </div>
                <div class="about-desc">
                    @if(have_rows('management'))
                        @while(have_rows('management'))
                            @php
                                the_row();
                            @endphp
                            <div class="classify">
                                <span>{{ get_sub_field('classify_title') }}</span>
                                {!! get_sub_field('classify_desc') !!}
                            </div>
                        @endwhile
                    @endif 
                </div>
                <img src="{{ get_field('sec04_banner')}}" alt="">
            </div>
        </div>
    </div>

@endsection