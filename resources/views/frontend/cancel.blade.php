@extends('frontend.template.nav') 
@section('title','Cancellation Policy') 

@section('style')
  
@stop

@section('header')
{!!FHelper::breadcrumb('Cancellation Policy')!!}
@stop

@section('content')
<div class="container content" style="text-align: center;">
       <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
       <img src="{{url()}}/public/frontend/images/2021/cancel.jpg">  
       <img src="{{url()}}/public/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop

@section('script') 
@stop
