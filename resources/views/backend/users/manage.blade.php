@extends('backend.template.index')
@section('title','Users')
@section('breadcrumb','Users')
@section('style')
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend/plugins/bootstrap-sweetalert/lib/sweet-alert.css">
@stop
@section('content')
<div class="table-responsive"> 
<table id="table" class="table table-striped table-condensed table-bordered table-hover display">
	<thead>
		<tr>
			<th>Sr.</th>
			<th>WW_ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Points</th>
			<th>Wallet</th>
			<th width="50">Match Played</th>
			<th>Joined</th>
			<th width="120"></th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{url()}}/public/backend/plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

<script>
$(document).ready(function(){
	
	$('#table').DataTable({
	JQueryUI: true,
	processing: true,
	serverSide: true,
	regex: true ,
	caseInsen: false,
	ajax: {
		'url' : '{{url()}}/backend/users/data',
	},

	order: [ [0, 'desc']] ,

	columns: [
	{data: 'id', name: 'id'},
	{data: 'ww_id', name: 'ww_id'},
	{data: 'name', name: 'name'},
	{data: 'email', name: 'email'},
	{data: 'points', name: 'points'},
	{data: 'wallet', name: 'wallet'},
	{data: 'matches', name: 'matches'},
	{data: 'joined', name: 'joined'},
	{data: 'action', name: 'action', orderable: false, searchable: false}
	],
	fnRowCallback : function(nRow, aData, iDisplayIndex) {
	$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
	return nRow;
	},
	destroy: true
	});
	});

	$('body').on('click','.delete',function(){
			that = $(this);
			swal({
				title: "Do you really want to delete this user?.",
				text: "Please confirm your action!",
				type: "error",
				showLoaderOnConfirm: true,
				showCancelButton: true,
				closeOnConfirm: false,
				confirmButtonText: "Delete!",
			},
			function(){
				$.ajax({
					url: '{{url()}}/backend/users/delete/'+$(that).data('id'),
					success: function(html){
						$(that).closest('tr').hide();
						swal(html);
					}
				});
			});
	});
</script>
@stop