{{--



Template Name: Company



--}}



@extends('layouts.app')

@section('content')

<div class="company">

    <div class="sec01">

        @php

        if(have_rows('company_sec01')){

        while(have_rows('company_sec01')){

        the_row();

        @endphp

        <div class="sec01-content">

            <div class="desc">

                <strong>{!!get_sub_field('company_sec01_title')!!}</strong>

                {!!get_sub_field('company_sec01_desc')!!}

            </div>

            <div class="thumb">

                <img src="{!!crop_img(960,450,get_sub_field('company_sec01_img'))!!}" alt="">

            </div>

        </div>

        @php

        }

        }

        @endphp

    </div>
    <div class="sec01-mobile">

        @php

        if(have_rows('company_sec01')){

        while(have_rows('company_sec01')){

        the_row();

        @endphp

        <div class="sec01-content">
            <div class="thumb">

                <img src="{!!crop_img(960,450,get_sub_field('company_sec01_img'))!!}" alt="">

            </div>

            <div class="desc">

                <strong>{!!get_sub_field('company_sec01_title')!!}</strong>

                {!!get_sub_field('company_sec01_desc')!!}

            </div>



        </div>

        @php

        }

        }

        @endphp

    </div>
    <div class="container">
        <div class="sec02">

            <div class="title">
    
                <h3> {{ get_field('sec02_title')}} </h3>
    
                {!! get_field('sec02_desc') !!}
    
            </div>
            <div class="images">
                <img src=" {{ get_field('sec02_img') }}" alt="">
            </div>
    
        </div>
        <div class="sec03">
            <img src="{{ get_field('sec03_img')}}" alt="">
        </div>
    </div>

</div>
@endsection