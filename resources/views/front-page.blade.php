@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row" id="begin-body">
    @include('partials.frontpage.banner')
    @include('partials.frontpage.slide')
    @include('partials.frontpage.collection')
    @include('partials.frontpage.paper')
    @include('partials.frontpage.store')
  </div>
</div>
@endsection