@extends('backend.template.index')
@section('title','Pending Bookings')
@section('breadcrumb','Pending Booking')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@stop
@section('content')
<div class="table-responsive">
	<table id="table" class="table table-striped table-bordered table-hover display">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>WW_ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Booking Data</th>
				<th>Payment</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<div class="modal fade" id="bib-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center"><!--Payer BIB number & Cash ID-->&nbsp;</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" id="payment"><input type="hidden" id="id" val="">
					<div class="form-group">
						<input required type="text" id="cash_id" class="form-control input-lg" placeholder="Enter Cash ID">
					</div>
					<div class="form-group text-center">
						<button type="submit" id="pay" class="btn btn-lg btn-primary">Pay</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<script>
$(document).ready(function(){
	
	$('#table').DataTable({
	JQueryUI: true,
	processing: true,
	serverSide: true,
	
	ajax: {
		'url' : '{{url()}}/backend/bookings/pending/data',
	},
	order: [ [0, 'desc']] ,
	columns: [
	{data: 'id', name: 'id'},
	{data: 'ww_id', name: 'ww_id' , regex: true , caseInsen: false},
	{data: 'name', name: 'name' , regex: true , caseInsen: true},
	{data: 'email', name: 'email' , regex: true , caseInsen: false},
	{data: 'data', name: 'data'},
	{data: 'payment', name: 'payment'},
	{data: 'date', name: 'date'},
	{data: 'action', name: 'action'},
	],
	fnRowCallback : function(nRow, aData, iDisplayIndex) {
	$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
	return nRow;
	},
	destroy: true
	});
	$('body').on('click','.pay',function(){
			that = $(this);
			$('#id').val($(this).attr('id'));
			swal({
				title: "Please confirm that you received cash.",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: true,
				animation: "slide-from-top",
				confirmButtonText: "Yes",
			},
			function(){
				$('#bib-modal').modal('show');
			});
	});
	$('#payment').submit(function(e){
		e.preventDefault();
		that = $(this);
		$('#pay').html('Please wait....').attr('disabled','true');
		var bib = $('#bibnum').val();
		var cash_id = $('#cash_id').val();
		var id = $('#id').val();
		$.ajax({
			url : '{{url()}}/backend/bookings/pending/pay/'+id,
			type : 'POST',
			data : {
				'_token' : "{{csrf_token()}}",
				'cash_id' : cash_id,
			},
			success : function(html) {
				$('#bib-modal').modal('hide');
				$('#bibnum').val('');
				$('#'+html).parents('tr').remove();
				$('#pay').html('Pay').removeAttr('disabled');
				swal('Booking paid successfully!');
			}
		})
	});
});
</script>
@stop