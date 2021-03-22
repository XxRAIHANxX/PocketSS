@extends('frontend.template.index')         
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
			<h3 class="pull-left lh">OUTDOOR FOOTBALL 8V8<br><big><span class="text-danger">{{ date('d F, Y - l',strtotime(Session::get('bookingdate'))) }}</span></big>
			<br><a class="gray"  style="cursor:pointer; text-decoration: underline" href="#">VENUE: PADANG KONTENA</a>
			<!-- <br><a class="gray"  style="cursor:pointer; text-decoration: underline" href="https://www.google.com/maps/place/Royal+Brunei+Recreation+Club/@4.9261598,114.9102751,14z/data=!4m19!1m13!4m12!1m4!2m2!1d114.9239296!2d4.9168384!4e1!1m6!1m2!1s0x3222f5a21bcc2b9d:0x409722e1b218231a!2srbrc+brunei!2m2!1d114.9290293!2d4.9374377!3m4!1s0x3222f5a21bcc2b9d:0x409722e1b218231a!8m2!3d4.9374377!4d114.9290293">VENUE: ROYAL BRUNEI RECREATIONAL CLUB (RBRC) - CLICK HERE FOR MAP</a> -->
			</h3>
			<h3 class="pull-right gray">
			<br> <br>
			<p style="text-transform:uppercase">{{-- THIS COMING {{ date('l',strtotime(Session::get('bookingdate'))) }} --}}</p></h3>
			<br>

	
			</table>
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
					<!-- <td>
					@if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$timeslot->end))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger">Closed</a>
					@else
					@if(FHelper::bookingcount(1,$timeslot->id) == 0)
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger">Full</a> 
				
					@elseif($timeslot->block == 1)
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" class="btn btn-danger">Reserved</a>
					
					@else
					<a href="{{url()}}/booking/{{$timeslot->id}}/court/1" style="background-color: green; color: white;" class="btn btn-success">Book Now</a>
					@endif
					 - {{10-FHelper::bookingcount(1,$timeslot->id)}}/10 
					@endif
					</td> -->
				      <td>
					@if(strtotime(date('Y-m-d H:i:s', strtotime(Session::get('bookingdate').' '.$timeslot->end))) <= strtotime(\Carbon\Carbon::now()->addMinutes(0)))
					<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " >Closed</a>
					@else
					@if(FHelper::bookingcount1(1,$timeslot->id) == 0)
					<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" class="btn btn-danger" style="border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  " >Full</a> 
					@else
					<a href="{{url()}}/booking1/{{$timeslot->id}}/court/1" style="background-color: green; color: white; border-radius: 12px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" class="btn btn-success">Book Now</a>
					@endif
					 - {{16-FHelper::bookingcount1(1,$timeslot->id)}}/16
					@endif
					</td>   
				</tr>
				@endforeach
			</table>
			@else
			<div style="margin-top:150px;"></div>
			<h3 class="text-center" style="font-size:80px">Sorry bookings will be open soon. For more updates please follow our Instagram account - @super_squad_soccer.</h3>
			<div class="margin-top"></div>
		<!-- 	<div class="text-center"><a href="{{url()}}/play">Choose another date to play</a></div> -->
			<div style="margin-top:150px;"></div>
			@endif
		</div>
	</div>
</div>

<div class="modal fade" id="map">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">MUMONG SPORTS COMPLEX</h4>
			</div>
			<div class="modal-body">
				{{--  <img src="{{url()}}/public/frontend/images/super8_map.jpg">  --}}
			</div>
		</div>
	</div>
</div>
@stop
 @section('script')  


@stop 