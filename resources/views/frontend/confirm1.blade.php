@extends('frontend.template.nav')
@section('title','Book')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<style type="text/css">
	.bib td{
		cursor: pointer;
	}
	.bib td:hover, .bib td.active{
		background-color: green !important;
		color: white;
	}
	.bib td.inactive{
		background: red;
		color: white;
		pointer-events: none;
	}

</style>
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
				 <!--This timeslot is blocked by admin. So you can't make booking in this timeslot for the moment.
				 <br>
				 <br> -->
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
			<h3 class="text-center">Space Available {{FHelper::bookingcount1(Session::get('court'),Session::get('timeslot'))}}/16</h3>
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
				{!!FHelper::bookingslot(['id'=>1,'player'=>'No.1 Goal Keeper'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>2,'player'=>'No.2 Left Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>3,'player'=>'No.3 Center Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>4,'player'=>'No.4 Right Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>5,'player'=>'No.5 Left Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>6,'player'=>'No.6 Center Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>7,'player'=>'No.7 Right Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>8,'player'=>'No.8 Center Forward'])!!}
			</div>
		</div>
		
		<div class="col-md-offset-4 col-md-4 col-sm-4 col-xs-12">
			<h3 align="center">Team B</h3>
			<br>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>9,'player'=>'No.1 Goal Keeper'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>10,'player'=>'No.2 Left Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>11,'player'=>'No.3 Center Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>12,'player'=>'No.4 Right Back'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>13,'player'=>'No.5 Left Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>14,'player'=>'No.6 Center Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>15,'player'=>'No.7 Right Midfield'])!!}
			</div>
			<div class="form-group">
				{!!FHelper::bookingslot(['id'=>16,'player'=>'No.8 Center Forward'])!!}
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="modal fade" id="bookingConfirmation">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center">Booking Confirmation</h4>
			</div>
			<div class="modal-body text-center" id="content">
				<h1 id="title"></h1>
				<p>Please select your BIB number</p>
				<table style='width: 50%; margin: 0 auto;' class='table table-bordered bib'>
					<tbody class="teamA hidden"> 
						<tr>
							{!!FHelper::bib(1, 'A')!!}
							{!!FHelper::bib(2, 'A')!!}
						</tr>
						<tr>
							{!!FHelper::bib(3, 'A')!!}
							{!!FHelper::bib(4, 'A')!!}
						</tr>
						<tr>
							{!!FHelper::bib(5, 'A')!!}
							{!!FHelper::bib(6, 'A')!!}
						</tr>
						<tr>
							{!!FHelper::bib(7, 'A')!!}
							
						</tr>
					</tbody>
					<tbody class="teamB hidden"> 
						<tr>
							{!!FHelper::bib(1, 'B')!!}
							{!!FHelper::bib(2, 'B')!!}
						</tr>
						<tr>
							{!!FHelper::bib(3, 'B')!!}
							{!!FHelper::bib(4, 'B')!!}
						</tr>
						<tr>
							{!!FHelper::bib(5, 'B')!!}
							{!!FHelper::bib(6, 'B')!!}
						</tr>
						<tr>
							{!!FHelper::bib(7, 'B')!!}
							
						</tr>
					</tbody>
				</table>
				<br><br>
				<div class="form-group">
					<input type="hidden" id="user_id" value="">
					<input type="hidden" name="bib_number" id="bib" value="">
					<span id="waiting">
						<button class="btn btn-lg btn-success confirm_booking">Book</button>
					</span>
					<button class="btn btn-lg btn-info" data-dismiss="modal">Cancel</button>
				</div>
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
				showCancelButton: true,
				closeOnConfirm: false,
				input: 'checkbox',
				inputValue: 1,
  				inputPlaceholder: 'By clicking on "Book", you are agreeing to our <a href="#">Terms &amp; Conditions</a>',
				animation: "slide-from-top",
				showLoaderOnConfirm: true,
				confirmButtonText: "Book",
			},
			function(){
				$.ajax({
					url: '{{url()}}/confirm/booking/'+$(that).data('id'),
					type: 'POST',
					data: { 
					'pay' : 1,
					'_token' : "{{csrf_token()}}"
					 },
					success: function(html){
						if(html == 'Thanks for booking!')
						{
							setTimeout(function() {
								window.location.href = '{{url("/")}}';
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
						swal(html);
					}
				});
			});
		});
		});
</script>  
@stop