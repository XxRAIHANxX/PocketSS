@extends('frontend.template.index')
@section('title','Ranking')

@section('style')
<style>body { 
background-image: url("{{url()}}/public/frontend/images/wwrb.jpg"); 
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

<form action="{{ action('CarsController@store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="brand" placeholder="Marka">
    <input type="text" name="model" placeholder="Model">
    <input type="text" name="doors" placeholder="Ilość drzwi">
    <input type="text" name="priceHour" placeholder="Cena za godzinę">
    <input type="text" name="priceDay" placeholder="Cena za dzień">
    <input type="text" name="priceWeek" placeholder="Cena za tydzień">
    <input type="text" name="priceMonth" placeholder="Cena za miesiąc">
    <input type="text" name="priceYear" placeholder="Cena za rok">
    <input type="submit" value="Osadź">

</form>

      <!-- <img src="{{url()}}/public/frontend/images/clan.jpg"> -->
    

</div>
@stop

@section('script')
@stop 
