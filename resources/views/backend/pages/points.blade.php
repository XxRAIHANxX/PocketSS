@extends('backend.template.index')
@section('title','Scores')
@section('breadcrumb','Scores')
@section('style')
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap-sweetalert/lib/sweet-alert.css">
<link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
@stop
@section('content')
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
<div class="row">
	<div class="col-md-offset-4 col-md-4">
		<div class="form-group">
			<input type="text" id="date" class="datepicker form-control" placeholder="Select Date" value="">
		</div>
	</div>
	<div class="col-md-12">
		<div class="table-responsive">
			<table id="table" class="table table-striped table-bordered table-hover display">
				<thead>
					<tr>
						<th>Timeslot</th>
						<th>Court A</th>
						<th>Court B</th>
					</tr>
				</thead>
				<tbody>
				@foreach($timeslots as $timeslot)

				<tr>
					<td>{{date('h:i A',strtotime($timeslot->start))}} - {{date('h:i A',strtotime($timeslot->end))}}</td>
					<td>
						<a href="{{url()}}/backend/scores/timeslot/{{$timeslot->id}}/court/1" class="btn btn-info">View Players</a>
					</td>
					<td>
						<a href="{{url()}}/backend/scores/timeslot/{{$timeslot->id}}/court/2" class="btn btn-info">View Players</a>
					</td>
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<script>
$(document).ready(function(){
	$('.datepicker').datetimepicker({
		format: "DD, MMMM YYYY" ,
		// maxDate: new Date(),
		defaultDate: new Date(),
	}).on('dp.change',function(e){
		$.ajax({
			url : '{{url()}}/backend/setdate/'+e.date.format('DD-MM-YYYY'),
		});
	});
	});
</script>
@stop