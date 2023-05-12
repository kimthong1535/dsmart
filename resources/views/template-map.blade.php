{{--

  Template Name: Map

--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="map-title">
            <h3>{{ get_field('map-title'); }}</h3>
            <p class="map-short-desc"><strong>{{ get_field('map-desc-left'); }}</strong>{{ get_field('map-desc-right'); }}</p>
            <div class="map-desc">{!! get_field('map-desc'); !!}</div>
        </div>
        <div class="map">{!! get_field('map'); !!}</div>
        <div class="address">
            @if ( have_rows('address') )
            <ul class="list-address">
                @php while( have_rows('address') ): the_row(); @endphp
                <li>
                    <div class="icon">{!! get_sub_field('icon') !!}</div>
                    <div class="name">{!! get_sub_field('name') !!}</div>
                    <div class="info">{!! get_sub_field('info') !!}</div>
                </li>
                @php endwhile @endphp
            </ul>
            @endif
        </div>
    </div>
@endsection