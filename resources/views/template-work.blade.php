{{--

Template Name: Work

--}}

@extends('layouts.app')

@section('content')
<div class="template-work">
    <div class="work-title">
        <h3 class="num-order">01</h3>
        <h3><strong>{{ get_field('work_title')}}</strong></h3>
    </div>
    <div class="work-image">
        <a href=".../product/%eb%b8%8c%eb%a1%9c%ec%85%94/"><img src="{{ get_field('image_left') }}" alt=""></a>      
        <a href=".../product/%eb%a6%ac%ed%94%8c%eb%a0%9b/"><img src="{{ get_field('image_right') }}" alt=""></a>
    </div>
    </div>
</div>
@endsection