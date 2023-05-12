{{--

  Template Name: Client

--}}



@extends('layouts.app')

@section('content')

    <div class="container">
      <div class="template-client">
        <div class="client-heading">
          <h2>{{ get_field('title_main', 48)}}</h2>
          {!! get_field('desc_main', 48) !!}
        </div>

        <div class="client-img">
          @php $count = 0 @endphp
          @if(have_rows('list_brand',48))
              <ul class="brand-list">
              @while(have_rows('list_brand',48))
                  @php
                      the_row();
                      $count++;
                  @endphp
                  <li class="brand-item {!! ($count) ? "show" : "" !!}">
                      <img src="{{ get_sub_field('image_brand') }}" alt="">
                  </li>
              @endwhile
              </ul>
          @endif 
        </div>
      </div>
    </div>
    <div class="client-banner">
      <img src="{{ get_field('sec02_banner', 48) }}" alt="">
      <div class="client-banner-title">
        <h2>{{ get_field('sec02_title', 48) }}</h2>
        {!! get_field('sec02_desc', 48) !!}
      </div>
    </div>
@endsection

