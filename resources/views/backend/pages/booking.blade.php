@extends('backend.template.index')
@section('title','Bookings')
@section('breadcrumb','Bookings')
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
			<th>Status</th>
			<th>Payment</th>
			<th>BIB</th>
			<th>Cash ID</th>
			<th>Date</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
</div>
@stop
@section('script')
<script>
$(document).ready(function(){
	
	$('#table').DataTable({
	JQueryUI: true,
	processing: true,
	serverSide: true,
	
	ajax: {
		'url' : '{{url()}}/backend/bookings/data',
	},
	order: [ [0, 'desc']] ,

	columns: [
	{data: 'id', name: 'id'},
	{data: 'ww_id', name: 'ww_id' , regex: true , caseInsen: false},
	{data: 'name', name: 'name' , regex: true , caseInsen: true},
	{data: 'email', name: 'email' , regex: true , caseInsen: false},
	{data: 'data', name: 'data'},
	{data: 'status', name: 'status'},
	{data: 'payment', name: 'payment'},
	{data: 'bib_number', name: 'bib_number'},
	{data: 'cash_id', name: 'cash_id'},
	{data: 'date', name: 'date'},
	],
	fnRowCallback : function(nRow, aData, iDisplayIndex) {
	$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
	return nRow;
	},
	destroy: true
	});
	});
</script>
@stop