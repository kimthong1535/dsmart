@php
$option = get_option('redux_dsmart');
$copyright = $option['copyright'];
$img_item = get_field('popup_image');
@endphp
<footer class="container-fluid" >
  <div class="row border-br"></div>
  <div class="row" id="footer"> @php(dynamic_sidebar('sidebar-footer')) 
    <div class="col-md-3 col-xs-12 item noti-government">
        <ul>
            <li>
            <a href="http://online.gov.vn/Home/WebDetails/68545" target="_blank" class="icon-bct">
                <img alt="Đã thông báo Bộ Công Thương" title="Đã thông báo Bộ Công Thương" src="<?php echo get_stylesheet_directory_uri() .'/resources/images/dathongbao-bocongthuong.png' ?>" style="width: 100%; float: left; opacity: 0.5; max-width: 85px!important;">
            </a>
            </li>
        </ul>
    </div>
  </div>
  <div class="row border-br"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="footer-copyright">{!! $copyright !!}</div>
      </div>
    </div>
  </div>
</footer>
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="close" data-dismiss="modal" aria-label="Close" style="background: #fff;">
          <span aria-hidden="true" class="btn-close-popup">×</span>
        </div>
        <a href="https://dchic.vn/san-pham" target="_blank">
          <img alt="Pop up" src="{!!crop_img(500,500,$img_item)!!}">
        </a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    if($('body.home').length){
      $(window).on('load', function() {
        $('#exampleModalCenter').modal('show');
    });
    }
    $('#exampleModalCenter .close').on('click', function() {
        $('#exampleModalCenter').hide();
        $('.modal-backdrop').hide();
    });
</script>
<script>
jQuery(document).ready(function ($) {
  var stickyNavTop = $('#top-menu').offset().top;
  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();
    if (scrollTop > stickyNavTop) { 
        $('#top-menu').addClass('top-menu-move');
    } else {
        $('#top-menu').removeClass('top-menu-move'); 
    }
  };
  stickyNav();
  $(window).scroll(function() {
    stickyNav();
  });
})
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>