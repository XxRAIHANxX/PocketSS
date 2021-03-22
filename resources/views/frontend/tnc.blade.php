@extends('frontend.template.nav') 
@section('title','Terms & Conditions') 

@section('style')
  
@stop

@section('header')
{!!FHelper::breadcrumb('Terms & Conditions')!!}
@stop

@section('content')
<div class="container content" style="text-align: center;">
       <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
       <img src="{{url()}}/public/frontend/images/2021/tnc.jpg">  
       <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop

@section('script') 
@stop
