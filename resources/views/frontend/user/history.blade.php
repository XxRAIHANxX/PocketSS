@extends('frontend.template.nav')
@section('title','Top Up History')

@section('style')
@stop

@section('header')
{!!FHelper::breadcrumb('Top Up History')!!}
@stop

@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h4>Top Up History <span class="pull-right">Current tokens: {{FHelper::wallet()}}</span></h4>
			<div class="margin-top"></div>
			<div class="table-reponsive">
			<table class="table table-striped">
				<tr>
					<th>Details</th>
					<th>Date/Time</th>
				</tr>
				@foreach($histories as $history)
				<tr>
					<td>{{abs($history->amount)}} token(s) {{$history->action}}
					@if($history->amount > 0)
					to your profile.
					@else
					from your profile.
					@endif

					</td>
					<td>
					<i class="fa fa-calendar"></i> {{date('d F, Y',strtotime($history->created_at))}}
					<br>
					<i class="fa fa-clock-o"></i> {{date('h:i A',strtotime($history->created_at))}}
					</td>
				</tr>
				@endforeach
			</table>
			</div>
			<div class="text-center">{!! $histories->render() !!}</div>
		</div>
	</div>
</div>
@stop

@section('script')
@stop
