@extends('backend.template.index')
@section('title','Make Bookings')
@section('breadcrumb','Make Booking')
@section('content')
<div class="row">
	<div class="col-md-12">
		@if(date('Y-m-d',strtotime(Session::get('bookingdate'))) >= date('Y-m-d'))
		<h3 class="text-center lh">BOOKING IS OPEN<br><big><span class="text-danger">{{ date('d F, Y - l',strtotime(Session::get('bookingdate'))) }}</span></big>
		</h3>
		<br>
		<table class="table table-striped">
			<tr>
				<th>Timeslot</th>
				<th>Court A</th>
			</tr>
			@foreach($timeslots as $timeslot)
			<tr>
				<td>{{date('h:i A',strtotime($timeslot->start))}} - {{date('h:i A',strtotime($timeslot->end))}}</td>
				<td>
					@if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$timeslot->end))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
					<a href="#" class="btn btn-danger">Closed</a>
					@else
					@if(FHelper::bookingcount(1,$timeslot->id) == 0)
					<a href="{{url()}}/backend/bookings/slot/{{$timeslot->id}}/court/1" class="btn btn-danger">Full</a>
					@else
					<a href="{{url()}}/backend/bookings/slot/{{$timeslot->id}}/court/1" class="btn btn-info">Click To Book</a>
					@endif
					- {{16-FHelper::bookingcount(1,$timeslot->id)}}/16
					@endif
				</td>
			</tr>
			@endforeach
		</table>
		@else
		<div style="margin-top:150px;"></div>
		<h3 class="text-center" style="font-size:80px">Sorry! You can't play in previous date.</h3>
		<div class="margin-top"></div>
		<div class="text-center"><a href="{{url()}}/play">Choose another date to play</a></div>
		<div style="margin-top:150px;"></div>
		@endif
	</div>
</div>
@stop
@section('script')
@stop