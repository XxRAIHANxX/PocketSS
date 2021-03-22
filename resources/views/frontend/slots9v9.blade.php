@extends('frontend.template.nav')      
@section('title','Time Slot')   
@section('style') 

@stop
@section('header')
{!!FHelper::breadcrumb('Time Slot')!!}
@stop
@section('content')
<div class="container content" >
	<div class="row">
		<div class="col-md-12">
			@if(date('Y-m-d',strtotime(Session::get('bookingdate'))) >= date('Y-m-d'))
			<h3 class="pull-left lh">
				OUTDOOR FOOTBALL 9v9
				<br />
				<big><span class="text-danger">{{ date('d F, Y - l',strtotime(Session::get('bookingdate'))) }}</span></big>
				<br />
				VENUE: Peak Performance
			</h3>
			<table class="table table-striped"> 
			<tr>
				<th>Timeslot</th>
				<th>Court A</th>
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
						<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  "  >Closed</a>
					@else
					{{-- insert pax no here, counter is for 5v5 = 10. If the game pax no is 14 (7v7), then use 10-14=-4  --}}
					{{-- @if(FHelper::bookingcount(1,$timeslot->id) == 0)  --}}
					@if(FHelper::bookingcount(1,$timeslot->id) == -8) 
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " >Full</a>
					@elseif($timeslot->block == 1)
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger" >Reserved</a>
						@elseif($timeslot->id == 541)
					<a href="" class="btn btn-danger" style="color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >Closed</a>
						@elseif($timeslot->id == 731)
					<a href="" class="btn btn-danger" style="color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >Closed</a>
						@elseif($timeslot->id == 821)
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger" style="color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >Closed</a>
					@else
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" style="background-color: green; color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " class="btn btn-success">Open</a>
					@endif
					 - {{10-FHelper::bookingcount(1,$timeslot->id)}}/18
					@endif
					</td>
				</tr>
				@endforeach
			</table>
			@else
			<div style="margin-top:150px;">
				<h3 class="text-center" style="font-size:60px">
					Sorry bookings will be open soon. For more updates please follow our Instagram account - @supersquadbn.
				</h3>
			</div>
		@endif
		</div>
	</div>
</div>
@stop
@section('script')

@stop 