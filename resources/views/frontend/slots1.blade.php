@extends('frontend.template.index2')         
@section('title','Time Slot') 
@section('style')

@stop
@section('header') 
{!!FHelper::breadcrumb('Time Slot')!!}  
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			@if(date('Y-m-d',strtotime(Session::get('bookingdate'))) >= date('Y-m-d'))
			<h3 class="pull-left lh">
				7v7
				<br />
				<big><span class="text-danger">{{ date('d F, Y - l',strtotime(Session::get('bookingdate'))) }}</span></big>
				<br />
				VENUE: Peak Performance
			</h3>

			<table class="table table-striped"> 
				<tr>
					<th>Timeslot</th>
					<th>Court A</th>
					<!--  <th>Court B</th>   -->
				</tr>
				@foreach($timeslots as $timeslot)
				<tr @if($timeslot->block == 1) class="danger" @endif>
					<td>
						@if(date('h:i A',strtotime($timeslot->start))==="10:30 PM")
							{{date('h:i A',strtotime($timeslot->start))}} - {{date('h:i A',strtotime($timeslot->end))}}
								@elseif(date('h:i A',strtotime($timeslot->start))==="08:00 AM")
									{{date('h:i A',strtotime($timeslot->start))}} - {{date('h:i A',strtotime($timeslot->end))}} 
								@else
							{{date('h:i A',strtotime($timeslot->start))}} - {{date('h:i A',strtotime($timeslot->end))}}
						@endif
					</td>
					<td>
						@if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$timeslot->end))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
							<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " >Closed</a>
						@else
						@if(FHelper::bookingcount1(1,$timeslot->id) == 0)
							{{-- <a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " >Full</a>  --}}
							<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" style="background-color: green; color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="btn btn-success">Book Now</a>
					{{--	@elseif($timeslot->id == 30)
								<a href=""  style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " class="btn btn-warning">Reserved</a> --}}
							@else
								<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" style="background-color: green; color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="btn btn-success">Book Now</a>
							@endif
							{{-- - {{14-FHelper::bookingcount1(1,$timeslot->id)}}/14 --}}
							@endif
						</td>   
					</tr>
				@endforeach
			</table>
			@else
			<div style="margin-top:150px;">
			
			</div>
			<h3 class="text-center" style="font-size:60px">
				Sorry bookings will be open soon. For more updates please follow our Instagram account - @supersquadbn.
			</h3>
			<div class="margin-top">

			</div>
			<div style="margin-top:150px;">
			
			</div>
			@endif
		</div>
	</div>
</div>
@stop
 @section('script')
@stop 