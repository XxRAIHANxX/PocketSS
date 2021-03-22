@extends('frontend.template.nav')
@section('title','Book')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Book Now')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-6">
			<h3>Booking Date: <span class="text-danger">{{ date('d F, Y',strtotime(Session::get('bookingdate'))) }}</span></h3>
		</div>
		<div class="col-md-6">
			<h3 class="text-right">Timeslot: <span class="text-danger">{{ FHelper::timeslot(Session::get('timeslot')) }}</span></h3>
		</div>
	</div>
	<div class="margin-top"></div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info text-center">
				<div class="panel-body">
					<img src="{{url()}}/public/frontend/images/court.png" alt="">
					<h2>Court 1</h2>
					<p>Space Available {{FHelper::bookingcount}}/14</p>
					<a href="{{url()}}/court/1" class="btn btn-info">Book Now</a>
				</div>
			</div>
		</div>
		{{-- <div class="col-md-4">
			<div class="panel panel-info text-center">
				<div class="panel-body">
					<img src="{{url()}}/public/frontend/images/court.png" alt="">
					<h2>Court 2</h2>
					<p>Space Available {{FHelper::bookingcount(0)}}/14</p>
					<a href="{{url()}}/court/2" class="btn btn-info">Book Now</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info text-center">
				<div class="panel-body">
					<img src="{{url()}}/public/frontend/images/court.png" alt="">
					<h2>Court 3</h2>
					<p>Space Available {{FHelper::bookingcount(0)}}/14</p>
					<a href="{{url()}}/court/3" class="btn btn-info">Book Now</a>
				</div>
			</div>
		</div> --}}
	</div>
</div>
</div>
</div>
@stop
@section('script')
@stop