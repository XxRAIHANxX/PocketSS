@extends('frontend.template.index2')
@section('title','Ranking') 

@section('style')
<style>body { 
background-image: url("{{url()}}/public/frontend/images/lbbg.png"); 
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>   
@stop

@section('header')
{!!FHelper::breadcrumb('Ranking')!!}
@stop

@section('content') 
<div class="container content">
 

    <img src="{{url()}}/public/frontend/images/lbs8m.png">  
     

</div>
@stop

@section('script')
@stop 
