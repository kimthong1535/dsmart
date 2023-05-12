{{--

Template Name: Giới thiệu

--}}

@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body" style="padding-top: 56px;">
    <div class="page-wrap about-wrap">
      <div class="page-title-head">
      <strong class="font-playfair">{{ get_field('introduction_titel')}}</strong>
      <p class="font-sfui">{{ get_field('introduction_desc')}}</p>
      </div>
      <div class="row about-content-item">
        <div class="col-xs-12 col-sm-12 col-md-6">
        {!!the_content()!!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="about-video">
            <div class="about-video-wrap">
            <iframe id="ytplayer" type="text/html" src="{{ get_field('introduction_video')}}" frameborder="0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Body-->
</div>
@endsection

