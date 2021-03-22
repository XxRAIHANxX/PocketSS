@extends('frontend.template.index')
@section('title','Ranking')

@section('style')
<style>body {background-color:black;}</style>
@stop

@section('header')
{!!FHelper::breadcrumb('Ranking')!!}
@stop

@section('content')
<div class="container content"  style="background-color:black">


      <img src="{{url()}}/public/frontend/images/corporate.jpg">
    

</div>
@stop

@section('script')
@stop
