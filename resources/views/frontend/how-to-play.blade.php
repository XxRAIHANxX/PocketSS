@extends('frontend.template.nav')
@section('title','How To Play')

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
{!!FHelper::breadcrumb('How To Play')!!}
@stop

@section('content')
<div class="container content" style="text-align: center;" >
	<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
	<img src="{{url()}}/public/frontend/images/2021/bg-2.png" width="" height="" alt="How to play"/>
	<img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop