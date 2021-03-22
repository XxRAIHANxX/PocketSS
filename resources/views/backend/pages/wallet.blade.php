@extends('backend.template.index')
@section('title','Wallet')
@section('breadcrumb','Wallet')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend/plugins/bootstrap-sweetalert/lib/sweet-alert.css">

@stop
@section('content')
<div class="table-responsive"> 

<table id="table" class="table table-striped table-bordered table-hover display">
	<thead>
		<tr>
			<th>Sr.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Wallet</th>
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
	ajax: {
		'url' : '{{url()}}/backend/wallet/data',
	},
		order: [ [0, 'desc']] ,

	columns: [
	{data: 'id', name: 'id'},
	{data: 'name', name: 'name'},
	{data: 'email', name: 'email'},
	{data: 'wallet', name: 'wallet'},
	{data: 'action', name: 'action', orderable: false, searchable: false}
	],
	fnRowCallback : function(nRow, aData, iDisplayIndex) {
	$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
	return nRow;
	},
	destroy: true
	});

	$('body').on('click','.add-to-wallet',function(){
		amt = $(this).closest('tr').find('.wallet').val();
			if(amt)
			that = $(this);
			swal({   
				title: "Please confirm you are adding amount of "+amt+" to user wallet.",   
				text: "Please confirm your action!",  
				type: "info",
				html: true ,   
				showCancelButton: true,   
				closeOnConfirm: false,
				animation: "slide-from-top",    
				showLoaderOnConfirm: true, 
				confirmButtonText: "Yes", 
			}, 
			function(){   
				$.ajax({
					url: '{{url()}}/backend/wallet/confirm/'+$(that).closest('tr').find('.wallet').data('id'),
					type: 'POST',
					data: {
						'amt':amt ,
						'_token': '{{csrf_token()}}'
					},
					success: function(html){
						$(that).closest('tr').find('.wallet').val('');
						$(that).closest('tr').find('.amount').html(parseInt($(that).closest('tr').find('.amount').html())+parseInt(amt));
						swal(html);
					}
				});
			});
	});

	});
</script>
@stop