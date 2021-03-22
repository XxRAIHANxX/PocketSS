<?php App\User::find(Auth::user()->id)->readAllNotifications(); ?>


@extends('backend.template.index')
@section('title','Notifications')
@section('breadcrumb','Notifications')
@section('content')
<table id="table" class="table table-striped table-bordered table-hover display">
	<thead>
		<tr>
			<th>Sr.</th>
			<th>Notifications</th>
			<th>User</th>
			<th>Time</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
@stop
@section('script')
<script>
$(document).ready(function(){
	
	$('#table').DataTable({
	JQueryUI: true,
	processing: true,
	serverSide: true,
	ajax: {
		'url' : '{{url()}}/backend/fetch/notifications',
	},
	order: [ [0, 'desc']] ,

	columns: [
	{data: 'id', name: 'id'},
	{data: 'text', name: 'text'},
	{data: 'user', name: 'user'},
	{data: 'time', name: 'time'}
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