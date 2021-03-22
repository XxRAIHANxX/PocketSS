@extends('backend.template.index')
@section('title','Confirm')
@section('breadcrumb','Confirm')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop
@section('header')
{!!FHelper::breadcrumb('Book Now')!!}
@stop
@section('content')
<div class="row">
	<div class="col-md-4 col-xs-12">
		<h3 class="text-left">
		Booking Date:
		<br>
		<span class="text-danger">{{ date('d F, Y',strtotime(Session::get('bookingdate'))) }}</span></h3>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3 class="text-center">Court: <span class="text-danger">{{ Session::get('court') }}</span></h3>
		<h3 class="text-center">Space Available {{FHelper::bookingcount(Session::get('court'),Session::get('timeslot'))}}/16</h3>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3 class="text-right">
		Timeslot:
		<br>
		<span class="text-danger">{{ FHelper::timeslot(Session::get('timeslot')) }}</span></h3>
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
			{!!FHelper::bookingslotbackend(['id'=>1,'player'=>'Goal Keeper'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>2,'player'=>'Left Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>3,'player'=>'Centre Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>4,'player'=>'Right Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>5,'player'=>'Left Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>6,'player'=>'Centre Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>7,'player'=>'Right Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>8,'player'=>'Centre Forward'])!!}
		</div>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<h3 align="center">Team B</h3>
		<br>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>9,'player'=>'Goal Keeper'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>10,'player'=>'Left Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>11,'player'=>'Centre Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>12,'player'=>'Right Back'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>13,'player'=>'Left Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>14,'player'=>'Centre Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>15,'player'=>'Right Midfield'])!!}
		</div>
		<div class="form-group">
			{!!FHelper::bookingslotbackend(['id'=>16,'player'=>'Centre Forward'])!!}
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
			<label for="bip">Bip Number:</label>
			<input type="text" value="N/A" class="form-control" id="bip" placeholder="Enter BIP Number">
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
<div class="modal fade" id="assignbip">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h1 class="text-center">Assign BIP</h1>
		</div>
		<div class="modal-body" style="width:300px;margin:0 auto;">
			<form action="" method="POST" id="bipnumber">
				<div class="form-group">
					<input type="hidden" required="" class="form-control" id="bookingid" value="">
					<input type="text" required="" class="form-control" id="bipnum" placeholder="Enter BIP Number">
				</div>
				<div class="form-group text-center">
					<button class="btn btn-info" type="submit">Assign</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
	$(function(){
		function isValidEmailAddress(emailAddress) {
				var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
			return pattern.test(emailAddress);
		};
		function checkuser(email) {
			$.ajax({
				url : '{{url()}}/backend/users/check/'+email,
				success : function(data){
					return data;
				}
			});
		}
		$('.available').click(function(){
			that = $(this);
			swal({
				title: "You are booking for "+$(this).data('player'),
				text: "Please confirm your booking!",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				confirmButtonText: "Book",
			},
			function(){
				swal({
					title: "Enter player email ID.",
					type:'input',
					inputPlaceholder: 'Email Address',
					html:true,
					showCancelButton: true,
					confirmButtonText: "Book",
					cancelButtonText: "Close",
					closeOnConfirm: false,
					showLoaderOnConfirm: true,
				},
				function(inputValue){
				if (inputValue === false)
					{
						return false;
					}
				if (!isValidEmailAddress(inputValue)) {
				swal.showInputError("Please provide player email address!");
				return false;
				}
				$.ajax({
						url : '{{url()}}/backend/users/check/'+inputValue,
						success : function(data){
							if(data == 0)
							{
								swal.showInputError("Player with email address does not exist!");
								return false;
							}
							if(data == 'booked')
							{
								swal.showInputError("Player with email address already booked this court!");
								return false;
							}
							else{
							swal.close();
							$('#confirmation').modal('show');
							$('.payment').attr('data-id',data);
							$('.payment').attr('data-position',$(that).data('id'));
						}
						}
					});
				});
				
			});
		});
	$('.payment').click(function(){
	$.ajax({
			url: '{{url()}}/backend/bookings/confirmation/'+$(this).data('position'),
					data: {
					'userID':$(this).data('id'),
					'pay':$(this).data('pay'),
					'bip':$('#bip').val(),
					},
					success: function(html){
					setTimeout(function() {
							window.location.href = '{{url("backend/bookings/confirm")}}';
					},
					5000);
					$(that).html('Booked');
					$(that).removeClass('available');
					$(that).addClass('btn-danger');
					swal("Message!", html, "info");
					window.location.reload();
					}
				});
	});

	$('.bip').click(function(){
		$('#assignbip').modal('show');
		$('#bookingid').val($(this).data('id'));
	});

	$('#bipnumber').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url: '{{url()}}/backend/bookings/assignbip',
					data: {
					'bookingID':$('#bookingid').val(),
					'bip':$('#bipnum').val(),
					},
					success: function(html){
					setTimeout(function() {
							window.location.href = '{{url("backend/bookings/confirm")}}';
					},
					5000);
					swal("Message!", html, "info");
					window.location.reload();
					}
		});
	});
});
</script>
@stop