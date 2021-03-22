@extends('backend.template.index')
@section('title','Timeslot')
@section('breadcrumb','Timeslot')
@section('style')
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<h4>Add New Timeslot</h4>
	</div>
	<form action="" method="POST">
		<div class="col-md-4">
			<div class="input-group time">
				<input required="" step="30" name="start" placeholder="Start" type="text" class="form-control"><span class="input-group-addon"><span class="ti-timer"></span></span>
			</div>
		</div>
		<div class="col-md-4">
			<div class="input-group time">
				<input required="" placeholder="End" name="end" type="text" class="form-control"><span class="input-group-addon"><span class="ti-timer"></span></span>
			</div>
		</div>
		<div class="col-md-4">
			{{csrf_field()}}
			<button type="submit" class="form-control btn btn-info">Add Timeslot</button>
		</div>
	</form>
</div>
<div class="clearix margin-top"></div>
<br>
<div class="flash-message">
	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	@if(Session::has($msg))
	<div class="alert alert-{{$msg}}">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Session::get($msg)}}</strong>
	</div>
	@endif
	@endforeach
</div>
<br>
<h4>Current Timeslots</h4>
<table class="table table-bordered">
	<tr>
		<th>Sr.</th>
		<th>Start</th>
		<th>End</th>
		<th>Block</th>
		<th>Message</th>
		<!-- <th>Delete</th> -->
	</tr>
	<?php $i=1; ?>
	@foreach($timeslots as $timeslot)
	<tr>
		<td>{{$i}}</td>
		<td>{{date('h:i A',strtotime($timeslot->start))}}</td>
		<td>{{date('h:i A',strtotime($timeslot->end))}}</td>
		<td>
			<div class="switch">
				<input class="block" id="switch{{$i}}" @if($timeslot->block == 1) checked="" @endif type="checkbox" data-id="{{$timeslot->id}}">
				<label for="switch{{$i}}" class="switch-success"></label>
			</div>
		</td>
		<td align="center">
			<div class="message">
				<textarea name="" data-id="{{$timeslot->id}}" class=" form-control" placeholder="Message To Be Displayed">{{$timeslot->msg}}</textarea>
				<br>
				<button id="" class="save btn btn-info">Save</button>
			</div>
		</td>
		<!-- <td><a class="btn btn-danger delete" href="{{url()}}/backend/timeslot/delete/{{$timeslot->id}}"><i class="fa fa-trash"></i></a></td>-->
</tr>
<?php $i++;?>
@endforeach
</table>
@stop
@section('script')
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(".time").datetimepicker({locale:"en-gb",format:"LT"});
		$('.block').on('click',function(){
			id = $(this).data('id');
			$.ajax({
				url : '{{url()}}/backend/timeslot/block/'+id,
			});
		});
		// $('.block').each(function(){
		// 	if($(this).is(':checked')){
		// 		$(this).parents('tr').find('.message').show();
		// 	}
		// 	else{
		// 		$(this).parents('tr').find('.message').hide();
		// 	}
		// });

		
		$('.save').click(function(){
			var msg = $(this).parents('td').find('textarea').val();
			var id = $(this).parents('td').find('textarea').data('id');
			var that = $(this);
			$.ajax({
				url : '{{url()}}/backend/timeslot/blockmsg/'+id,
				type : 'POST',
				data : {
					'_token': '{{ csrf_token() }}',
					'msg':msg,
				},
				beforeSend: function(){
					$(that).html('<i class="fa fa-spin fa-refresh"></i>');
				},
				success: function(){
					$(that).html('Saved');
				}
			});
			
		});
	});
</script>
@stop