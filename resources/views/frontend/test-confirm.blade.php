@extends('frontend.template.nav')
@section('title','Book')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop
@section('header')
{!!FHelper::breadcrumb('Book Now')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center text-danger">
			@if(Fhelper::checkblock() == 1)
			<div class="alert alert-danger">
				{{-- This timeslot is blocked by admin. So you can't make booking in this timeslot for the moment.
				<br>
				<br>--}}				
 				<p>
					{{Fhelper::blockmsg()}}
				</p>
			</div>
			@endif
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<h3>Booking Date: <span class="text-danger">{{ date('d F, Y',strtotime(Session::get('bookingdate'))) }}</span></h3>
		</div>
		<div class="col-md-4 col-xs-12">
			<h3 class="text-center">Court: <span class="text-danger">{{ Session::get('court') }}</span></h3>
			<h3 class="text-center">Space Available {{FHelper::bookingcount(Session::get('court'),Session::get('timeslot'))}}/10</h3>
		</div>
		<div class="col-md-4 col-xs-12">
			<h3 class="text-right">Timeslot: <span class="text-danger">{{ FHelper::timeslot(Session::get('timeslot')) }}</span></h3>
		</div>
	</div>
	<div class="margin-top"></div>
	<div class="row">
		<div class="col-md-12">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<h3 align="center">Team A</h3>
			<br>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>1,'player'=>'Goal Keeper'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>2,'player'=>'Player 1'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>3,'player'=>'Player 2'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>4,'player'=>'Player 3'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>5,'player'=>'Player 4'])!!}
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			{{-- <h3 align="center">Select Player</h3>
			<br>
			<div class="form-group text-center">
				<p>Goal Keeper</p>
			</div>
			<div class="form-group text-center">
				<p>Player 1</p>
			</div>
			<div class="form-group text-center">
				<p>Player 2</p>
			</div>
			<div class="form-group text-center">
				<p>Player 3</p>
			</div>
			<div class="form-group text-center">
				<p>Player 4</p>
			</div> --}}
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<h3 align="center">Team B</h3>
			<br>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>6,'player'=>'Goal Keeper'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>7,'player'=>'Player 1'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>8,'player'=>'Player 2'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>9,'player'=>'Player 3'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>10,'player'=>'Player 4'])!!}
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="confirmation">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h1 class="text-center">Booking Fees <span class="text-danger">1</span> Credit</h1>
	</div>
	<div class="modal-body" style="width:300px;margin:0 auto;">
	<br>
		<button data-pay="1" data-id="" class="form-control payment btn">Book & Pay Now!</button>
		<br>
		<br>
		<button data-pay="0" data-id="" class="form-control payment btn">Book Now & Pay Later!</button>
		<br>
		<br>
	</div>
</div>
</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
	$(function(){
		$('.available').click(function(){
			that = $(this);
			swal({
				title: "You are booking for "+$(this).data('player'),
				text: "Please confirm your booking!",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: true,
				animation: "slide-from-top",
				showLoaderOnConfirm: false,
				confirmButtonText: "Book",
			},
			function(){
				$('#confirmation').modal('show');
				$('.payment').attr('data-id',$(that).data('id'));
			});

			$('.payment').click(function(){
			$(this).html('Please wait <i class="fa fa-refresh fa-spin"></i>');
			$.ajax({
				url: '{{url()}}/confirm/booking/'+$(this).data('id'),
				type: 'POST',
				data: { 
					'pay' : $(this).data('pay'),
					'_token' : "{{csrf_token()}}"
					 },
				success: function(html){
						if(html == 'Thanks for booking!')
						{
								setTimeout(function() {
										window.location.href = '{{url("timeslot")}}';
								},
								2000);
								$(that).html('Booked');
								$(that).removeClass('available');
								$(that).addClass('btn-danger');
						}
						if(html == 'You do not have sufficient funds!')
						{
								setTimeout(function() {
										window.location.href = '{{url("wallet")}}';
								},
								2000);
						}
						setTimeout(function() {
										window.location.href = '{{url("timeslot")}}';
								},
								2000);
						swal(html);
				}
				});
			});
		});
	});
</script>
@stop