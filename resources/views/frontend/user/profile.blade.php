@extends('frontend.template.nav')
@section('title','Profile')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Profile')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				@if(Session::has($msg))
				<div class="alert alert-{{$msg}}">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{{Session::get($msg)}}</strong>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img id="avatar" class="" style="width: 300px;height: 300px;" src="{{url()}}/{{Auth::user()->pic}}" alt="">
		</div>
		<div class="col-md-8">
			<h3>Personal Info &nbsp; &nbsp; &nbsp;<a href="{{url()}}/profile/edit" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a></h3>
			<div class="form-group">
				<label for="">SS_ID:</label>
				{{FHelper::playerid(Auth::user()->id, Auth::user()->country)}}
			</div>
			<div class="form-group">
				<label for="">Name:</label>
				{{Auth::user()->name}}
			</div>
			<div class="form-group">
				<label for="">Email:</label>
				{{Auth::user()->email}}
			</div>
			<div class="form-group">
				<label for="">Telephone:</label>
				{{Auth::user()->telephone}}
			</div>
			<div class="form-group">
				<label for="">DOB:</label>
				{{Auth::user()->dob}}
			</div>
			<div class="form-group">
				<label for="">Emergency contact:</label>
				{{Auth::user()->next_kin}}
			</div>
			<div class="form-group">
				<label for="">Emergency number:</label>
				{{Auth::user()->nextkin_con}}
			</div>
			<div class="margin-top"></div>
			&nbsp;
			<div class="row">
				<!-- <div class="col-md-6">
					<h3>Online Credits &nbsp; &nbsp; &nbsp;<a href="{{url()}}/wallet" class="btn btn-info">$ Top Up</a></h3>
					<div class="form-group">
						<label for="">Available:</label>
						<b>{{FHelper::wallet()}}</b> credits
					</div>
				</div> -->
				<div class="col-md-6">
					<h3>Score &nbsp; &nbsp; &nbsp;<a href="{{url()}}/points" class="btn btn-info">View Details</a></h3>
					<div class="form-group">
						<label for="">Available:</label>
						<b>{{FHelper::points()}}</b> point(s)
					</div>
				</div>
			</div>
			
			<div class="margin-top"></div>
			&nbsp;
			<div class="row">
				<div class="col-md-12">
					<h3>Bookings &nbsp; &nbsp; &nbsp;<a href="{{url()}}/bookings" class="btn btn-info">View All</a></h3>
					<table class="table table-striped">
				<tr>
					<th>Play Date</th>
					<th>Timeslot</th>
					<th>Court #</th>
					<th>Booking Date</th>
				</tr>
				@foreach(FHelper::latestBookings() as $booking)
				<tr>
					<td><i class="fa fa-calendar"></i> {{date('d F, Y',strtotime($booking->date))}}</td>
					<td><i class="fa fa-clock-o"></i> {{FHelper::timeslot($booking->timeslot_id)}}</td>
					<td><button class="btn btn-success">{{$booking->court}}</button></td>
					<td>
					<i class="fa fa-calendar"></i> {{date('d F, Y',strtotime($booking->created_at))}}
					<br>
					<i class="fa fa-clock-o"></i> {{date('h:i A',strtotime($booking->created_at))}}
					</td>
				</tr>
				@endforeach
			</table>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
@stop
@section('script')
<script>
	function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#avatar').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$("#newavatar").change(function(){
readURL(this);
});
</script>
@stop