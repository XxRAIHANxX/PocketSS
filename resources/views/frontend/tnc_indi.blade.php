@extends('frontend.template.nav') 
@section('title','Terms & Conditions') 

@section('style')
<style>body { 
background-image: url("{{url()}}/public/frontend/images/wwrb.jpg"); 
background-repeat: no-repeat;
background-size: cover;
}
</style>   
@stop

@section('header')
{!!FHelper::breadcrumb('Terms & Conditions')!!}
@stop

@section('content')
<div class="container content">


     <img src="{{url()}}/public/frontend/images/tnc1.jpg">  
    <img src="{{url()}}/public/frontend/images/tnc2.jpg"> 

</div>
@stop

@section('script') 
@stop
