{{-- 
    Template Name: Showroom
--}} 
@extends('layouts.app') 
@section('content') 
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body" style="padding-top: 56px;">
    <div class="container content content_wp not-fixed body-content" id="content">
      <div class="row showroom-page">
        <div class="wrapper_main_2_column_left">
          <!-- wrapper_main -->
          <div class="col-sm-4 col-12 float-left">
            <div class="block_showroom showroom_0 blocks_showroom blocks0 block" style="margin-bottom: 30px;">
              <ul>
                <li class="item level_0  "> 
                    @if(have_rows('showroom_location')) 
                        @while(have_rows('showroom_location')) 
                            @php the_row(); 
                            @endphp
                            <h2 class="cat_title">{{ get_sub_field('location_titel') }}</h2>
                            <ul class="wrapper_children showroom-list-wp" style="list-style-type:disc; margin-left:20px;">
                                @if(have_rows('location_content')) 
                                    @while(have_rows('location_content')) 
                                        @php the_row(); 
                                        @endphp 
                                        <li class="item level_1 fix-showroom">
                                        <h3 class="name">
                                        <a href="{{ get_sub_field('location_url') }}">{{ get_sub_field('location_adress') }}</a>
                                        </h3>
                                        </li> 
                                    @endwhile 
                                    @php wp_reset_query();@endphp
                                @endif 
                            </ul>
                        @endwhile 
                    @endif 
                    <!-- {!! get_field('location') !!} -->
                  <div class="clear"></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-8 col-12 showroom-detail float-left">
            <!-- main-area -->
            <div class="inner-main-area">
              <div class="clear"></div>
              <div class="address">
                <h1 class="title">{{ get_field('showroom_titel')}} </h1>
                <p  class="title-detail">
                  <i class="glyphicon glyphicon-map-marker"></i>&nbsp;{{ get_field('showroom_address')}}
                </p>
                <p  class="title-detail titel-detail-hotline">
                  <i class="glyphicon glyphicon-phone-alt"></i>&nbsp;{{ get_field('showroom_hotline')}}
                </p>
                <div class="more_info"></div>
                <div class="jsor-gallery">
                  <!-- Jsor Slide html -->
                  <div id="jssor_1" style="position: relative; margin: 0px auto; top: 0px; left: 0px; width: 768px; height: 512px; overflow: hidden; visibility: visible;" data-jssor-slider="1">
                    <!-- Loading Screen -->
                    <div style="position: absolute; display: block; top: 0px; left: 0px; width: 768px; height: 512px;">
                      <div style="position: absolute; display: block; top: 0px; left: 0px; width: 768px; height: 512px; transform: scale(1.001);">
                        <div data-u="slides" style="cursor: default; position: absolute; top: 0px; left: 0px; width: 768px; height: 512px; overflow: hidden; margin: 0px; padding: 0px; z-index: 0; pointer-events: none;">
                          <div style="top: 0px; left: 0px; width: 768px; height: 512px; position: absolute; z-index: 0; display: none;"></div>
                        </div>
                        <div data-u="slides" style="cursor: default; position: absolute; top: 0px; left: 0px; width: 768px; height: 512px; overflow: hidden; margin: 0px; padding: 0px; z-index: 0;">
                          <div data-p="170.00" data-events="auto" data-display="block" style="z-index: 1; top: 0px; left: 0px; width: 768px; height: 512px; position: absolute; overflow: hidden; perspective: 170px;">
                            <img data-u="image" src="https://static.dchic.vn/uploads/media/2022/05/14_CShading_LightMix0000-957880988-768x512.jpg" border="0" style="top: 0px; left: 0px; width: 768px; height: 512px; position: absolute; display: block; z-index: 1;" data-events="auto" data-display="block">
                            <img data-u="thumb" src="https://static.dchic.vn/uploads/media/2022/05/14_CShading_LightMix0000-957880988-300x200.jpg" data-events="auto" data-display="none" style="display: none; z-index: 1;">
                          </div>
                          <div data-p="170.00" data-events="auto" data-display="block" style="z-index: 1; top: 0px; left: 0px; width: 768px; height: 512px; position: absolute; overflow: hidden; perspective: 170px; transform: translate3d(768px, 0px, 0px);">
                            <img data-u="image" src="https://static.dchic.vn/uploads/media/2022/05/T1 0000-467074128-768x512.jpg" border="0" style="top: 0px; left: 0px; width: 768px; height: 512px; position: absolute; display: block; z-index: 1;" data-events="auto" data-display="block">
                            <img data-u="thumb" src="https://static.dchic.vn/uploads/media/2022/05/T1 0000-467074128-300x200.jpg" data-events="auto" data-display="none" style="display: none; z-index: 1;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Thumbnail Navigator -->
                    <div style="position: absolute; display: block; bottom: 0px; left: 0px; width: 768px; height: 110px;">
                      <div data-u="thumbnavigator" class="jssort101" style="position: absolute; left: 0px; bottom: 0px; width: 768px; height: 110px; background-color: rgb(0, 0, 0); visibility: visible; top: 0px;" data-autocenter="1" data-scale-bottom="0.75" data-jssor-thumb="1" data-jssor-slider="1">
                        <div style="position: absolute; display: block; top: 5px; left: 0px; width: 768px; height: 100px;" id="slide-w">
                          <div style="position: absolute; display: block; top: 0px; left: 0px; width: 768px; height: 100px; transform: scale(1.001);">
                            <div data-u="slides"  style="position: absolute; overflow: hidden; width: 768px; height: 100px; left: 0px; top: 0px; margin: 0px; padding: 0px; z-index: 0; pointer-events: none;">
                              <div style="top: 0px; left: 0px; width: 150px; height: 100px; position: absolute; display: block; z-index: 0; transform: translate3d(386.5px, 0px, 0px);"></div>
                            </div>
                            <div data-u="slides" style="position: absolute; overflow: hidden; width: 768px; height: 100px; left: 0px; top: 0px; margin: 0px; padding: 0px; z-index: 0;">
                              <div data-events="auto" data-display="block" style="z-index: 1; top: 0px; left: 0px; width: 150px; height: 100px; position: absolute; overflow: hidden; transform: translate3d(231.5px, 0px, 0px);">
                                <div data-u="prototype" class="p pav" style="width: 150px; height: 100px; left: 0px; top: 0px; z-index: 1;" data-jssor-button="1" data-events="auto" data-display="block">
                                  <img data-u="thumb" src="https://static.dchic.vn/uploads/media/2022/05/14_CShading_LightMix0000-957880988-300x200.jpg" class="t" data-events="auto" data-display="block" style="z-index: 1;">
                                </div>
                              </div>
                              <div data-events="auto" data-display="block"  style="z-index: 1; top: 0px; left: 0px; width: 150px; height: 100px; position: absolute; overflow: hidden; transform: translate3d(386.5px, 0px, 0px);">
                                <div data-u="prototype" class="p" style="width: 150px; height: 100px; left: 0px; top: 0px; z-index: 1;" data-jssor-button="1" data-events="auto" data-display="block">
                                  <img data-u="thumb" src="https://static.dchic.vn/uploads/media/2022/05/T1 0000-467074128-300x200.jpg" class="t" data-events="auto" data-display="block" style="z-index: 1;">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <div style="position: absolute;  display: block; top: 162px; left: 30px; width: 55px; height: 55px;" id="btn-left" >
                      <div data-u="arrowleft" class="jssora106" style="width: 55px; height: 55px; top: 0px; left: 0px;" data-scale="0.75" data-jssor-button="1" data-nofreeze="1">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                          <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                          <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                          <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                        </svg>
                      </div>
                    </div>
                    <div style="position: absolute; display: block; top: 162px; right: 30px; width: 55px; height: 55px;" id="btn-right">
                      <div data-u="arrowright" class="jssora106" style="width: 55px; height: 55px; top: 0px; right: 30px; left: 0px;" data-scale="0.75" data-jssor-button="1" data-nofreeze="1">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                          <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                          <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                          <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <!--/ Jsor Slide html -->
                </div>
                <div class="content-box title-detail" style="clear: left;padding-top: 25px"> {!!the_content()!!} <p></p>
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <link href="/css/showroom.css" rel="stylesheet">
    <!-- <style>
    
      @media screen and (min-width: 1200px) {
        .content_wp {
          width: 80%;
          max-width: initial;
        }
      }

      @media screen and (max-width: 768px) {
        .content_wp {
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style><style>
      

      @media(max-width: 768px) {
        .showroom-page {
          padding-top: 10px !important;
        }

        .showroom-page .showroom-detail {
          padding-left: 15px;
        }

        .showroom-page .wrapper {
          padding: 15px 0;
        }
      }

      @media(max-width:1200px) {

        .showroom-page .wrapper_main_2_column_left .left,
        .showroom-page .main-area {
          width: 100%;
        }

        .showroom-page .main-area {
          padding-top: 5%;
        }

        .showroom-page .photospace_res {
          width: 100%;
          float: left;
        }
      }
    </style> -->
    <!-- Jsor Slide -->
  </div>
  <!--End Body-->
</div> 
@endsection