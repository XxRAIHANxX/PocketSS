@extends('frontend.template.nav')
@section('title','Bookings')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

@stop

@section('header')
{!!FHelper::breadcrumb('Bookings')!!}
@stop

@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h3>Booking History</h3>
			<div class="margin-top"></div>
			<table class="table table-striped">
				<tr>
					<th>Play Date</th>
					<th>Timeslot</th>
					<th>Court #</th>
					<th>Team</th>
					<th>Booking Date</th>
					<th>Action</th>
				</tr>
				@foreach($bookings as $booking)
				<tr>
					<td><i class="fa fa-calendar"></i> {{date('d F, Y',strtotime($booking->date))}}</td>
					<td><i class="fa fa-clock-o"></i> {{FHelper::timeslot($booking->timeslot_id)}}</td>
					<td><button class="btn btn-success">{{$booking->court}}</button></td>
					<td><button class="btn btn-success">{{$booking->team}}</button></td>
					<td>
					<i class="fa fa-calendar"></i> {{date('d F, Y',strtotime($booking->created_at))}}
					<br>
					<i class="fa fa-clock-o"></i> {{date('h:i A',strtotime($booking->created_at))}}
					</td>
					{{-- @if(strtotime(date('Y-m-d H:i:s', strtotime($booking->date.' '.App\Timeslot::where('id','=',$booking->timeslot_id)->pluck('start')))) >= strtotime(\Carbon\Carbon::now()->addMinutes(120))) --}}
					@if($booking->cancel == 1)
					<td><button class="btn btn-danger">Cancelled</button></td>
					@elseif($booking->cancel == 0)
					<td><button href="#cancel" data-id="{{$booking->id}}" class="btn btn-info cancel">Cancel</button></td>
					@endif
					{{-- @else
					@if($booking->cancel == 0)
					<td><a href="{{url()}}/points" class="btn btn-info">View Score</a></td>
					@elseif($booking->cancel == 1)
					<td><button class="btn btn-danger">Cancelled</button></td>
					@endif

					@endif --}}
					
				</tr>
				@endforeach
			</table>
			<div class="text-center">{!! $bookings->render() !!}</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
	$(function(){
		$('.cancel').click(function(){
			that = $(this);
			swal({   
				title: "Do you really want to cancel your booking.",   
				text: "Please confirm your cancellation!",  
				type: "info",   
				showCancelButton: true,   
				closeOnConfirm: false,
				 animation: "slide-from-top",    
				showLoaderOnConfirm: true, 
				confirmButtonText: "Yes", 
				cancelButtonText: "No", 
			}, 
			function(){   
				$.ajax({
					url: '{{url()}}/cancel/booking/'+$(that).data('id'),
					success: function(html){
						swal(html);
						window.location.reload();
					}
				});
			});
		});
	});	
</script>
@stop