@extends('frontend.template.nav')
@section('title','Team Schedule')

@section('style')
<style>
	body { 
		background-image: url("{{url()}}/public/frontend/images/2021/bg-2.png.png");
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>   
@stop

@section('header')
{!!FHelper::breadcrumb('Team Schedule')!!}
@stop

@section('content')
<div class="container content" style="text-align: center;" >
	<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
    <br />
    {{-- MONDAY --}}
    <img src="{{url()}}/public/frontend/images/2021/team/Slide1.png" width="" height="" alt="How to play"/>
	<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
    <br />
    {{-- TUESDAY --}}
    <img src="{{url()}}/public/frontend/images/2021/team/Slide2.png" width="" height="" alt="How to play"/>
    <img src="{{url()}}/public/frontend/images/2021/team/Slide3.png" width="" height="" alt="How to play"/>
	<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
    <br />
    {{-- WEDNESDAY --}}
    <img src="{{url()}}/public/frontend/images/2021/team/Slide4.png" width="" height="" alt="How to play"/>
    <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
    <br />
    {{-- FRIDAY --}}
    <img src="{{url()}}/public/frontend/images/2021/team/Slide5.png" width="" height="" alt="How to play"/>
    <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
    <br />
    {{-- SATURDAY --}}
    <img src="{{url()}}/public/frontend/images/2021/team/Slide6.png" width="" height="" alt="How to play"/>
    <img src="{{url()}}/public/frontend/images/2021/team/Slide7.png" width="" height="" alt="How to play"/>
    <br />
    <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop