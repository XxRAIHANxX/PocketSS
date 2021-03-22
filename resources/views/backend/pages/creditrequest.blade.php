@extends('backend.template.index')
@section('title','Credit Requests')
@section('breadcrumb','Credit Requests')
@section('style')
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css">
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
				<th>Credit(s)</th>
				<th>Amount $</th>
				<th>Date</th>
				<th width="120">Action</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<div class="modal fade" id="confirm">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Change Credit Request</h4>
			</div>
			<div class="modal-body">
				<form action="" method="POST" role="form">
				<input type="hidden" name="id" id="requestid" value="">
				<input type="hidden" name="current" id="current" value="">
				<div class="form-group">
					<label for="">Current Amount Paid</label>
					<h4 id="showamount"></h4>
				</div>
				<div class="form-group">
					<label for="">Current Credit Request</label>
					<h4 id="showcredit"></h4>
				</div>
					<div class="form-group">
						<label for="">Upgrade Credit Request (Keep empty if no upgradion)</label>
						<select required="" id="new_credit" name="new_credit" type="text" class="form-control" id="">
							<option value="">-Select Credit-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
						</select>
					</div>
					<div class="form-group text-center">
						<button class="btn" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary acceptrequest">Submit</button>
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
	
	table = $('#table').DataTable({
	JQueryUI: true,
	processing: true,
	serverSide: true,
	ajax: {
		'url' : '{{url()}}/backend/wallet/requests/data',
	},
	order: [ [0, 'desc']] ,

	columns: [
	{data: 'id', name: 'id'},
	{data: 'ww_id', name: 'ww_id'},
	{data: 'name', name: 'name' , regex: true , caseInsen: false},
	{data: 'email', name: 'email' },
	{data: 'credit', name: 'credit'},
	{data: 'amount', name: 'amount'},
	{data: 'date', name: 'date'},
	{data: 'action', name: 'action', orderable: false, searchable: true}
	],
	fnRowCallback : function(nRow, aData, iDisplayIndex) {
	$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
	return nRow;
	},
	destroy: true
	});

	

	$('body').on('click','.accept',function(){
			current = $(this).attr('id');
			credit = $(this).closest('tr').find('.credit').val();
			amt = $(this).closest('tr').find('.amount').val();
			requestid = $(this).closest('tr').find('.credit').data('id');
			$('#confirm').modal();
			$('#requestid').val(requestid);
			$('#showcredit').html(credit);
			$('#showamount').html('$'+amt);
			$('#current').val(current);
	});

	$('body').on('click','.acceptrequest',function(){
			credit = $('#showcredit').html();
			amt = $('#showamount').html();
			that = $(this);
			var amount = credit;
			if($('#new_credit').val() != ''){
				var amount = $('#new_credit').val();
			}
			swal({
				title: "Please confirm you are adding "+amount+" credit to user wallet.",
				text: "Please confirm your action!",
				type: "info",
				html: true ,
				showCancelButton: true,
				closeOnConfirm: true,
				showLoaderOnConfirm: true,
				confirmButtonText: "Yes",
			},
			function(){
				$.ajax({
				url: '{{url()}}/backend/wallet/confirm/'+$('#requestid').val(),
				type: 'POST',
				data: {
							'credit_request':1,
							'amt':amount ,
							'new_credit':amount ,
							'_token': '{{csrf_token()}}'
				},
				success: function(html){
							$('#confirm').modal('hide');
							$('#'+$('#current').val()).closest('td').html('<h5 class="text-success">Approved</h5>');
							swal(html);

				}
				});
			});
	});
	$('body').on('click','.reject',function(){
			amt = $(this).closest('tr').find('.credit').val();
			that = $(this);
			swal({
				title: "Do you really want to decline user request?.",
				text: "Please confirm your action!",
				type: "error",
				showLoaderOnConfirm: true,
				showCancelButton: true,
				closeOnConfirm: false,
				confirmButtonText: "Decline",
			},
			function(){
				$.ajax({
					url: '{{url()}}/backend/wallet/request/cancel/'+$(that).closest('tr').find('.credit').data('id'),
					success: function(html){
						$(that).closest('td').html('<h5 class="text-danger">Declined</h5>');
						swal(html);
					}
				});
			});
	});
	});
</script>
@stop