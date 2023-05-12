{{-- 
  Template Name: Contact
--}} 
@extends('layouts.app') 
@section('content') 
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body" style="padding-top: 56px;">
    <div class="page-wrap contact-wrap">
      <div class="page-title-head">
        <strong class="font-playfair">{{ get_field('contact_titel')}}</strong>
        <p class="font-sfui">{{ get_field('contact_desc')}}</p>
      </div>
      <div class="contact-center-wrap">
        <div class="w-100">
          <div class="col-12 contact-content">
            <strong>{{ get_field('contact_content')}}</strong> {!!the_content()!!}
          </div>
        </div>
        <div class="w-100">
          <form id="contact_form" method="post" novalidate="novalidate"> 
            {!!do_shortcode('[contact-form-7 id="404" title="Form liên hệ"]')!!} 
            <input type="hidden" name="gReCaptchaToken">
            <input name="__RequestVerificationToken" type="hidden" value="CfDJ8LYUHpAJ0HJBplfpYg_hctIgRofWc7U5rz0eoI2yFfjXgB1r3xklVC8LqgqVQMgLCiv2faTUa9bRgiCnmzLQOQxCrqVZAD088o7P5CmXaavcAc2Rs61iVzt4bWQ_QDVx1qeKKkE-al_TLdx_Glg7ryk">
          </form>
          <div class="row"></div>
        </div>
      </div>
    </div>
  </div>
  <!--End Body-->
</div> 
@endsection