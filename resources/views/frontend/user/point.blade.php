@extends('frontend.template.nav')
@section('title','My Scores')

@section('style')
@stop

@section('header')
{!!FHelper::breadcrumb('My Scores')!!}
@stop

@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-12">
			<h3>My Score Board <span class="pull-right">Total Scores: {{FHelper::points()}}</span></h3>
			<div class="margin-top"></div>
			<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Match Date</th>
					<th>Timeslot & Court</th>
					<th>Details</th>
					<th>Score</th>
				</tr>

				@foreach($points as $point)
				@if ($point->season==2)
				<tr>
					<td>{{date('d, F Y',strtotime($point->created_at))}}</th>

					<td>{{FHelper::timeslot($point->timeslot_id)}}</th>
					<td>
						<table class="table table-bordered result">
							<tr>
								<th>Result</th>
								<th>Goals</th>
								<th>Goals Conceded</th>
								<th>Clean Sheet</th>
								<th>Red Cards</th>
								<th>Yellow Cards</th>
								<th>Assist</th>
							</tr>
							<tr>
								<td>
								@if($point->result == 1)
								Won
								@elseif($point->result == 0)
								Draw
								@elseif($point->result == -1)
								Loss
								@endif
								</td>
								<td>{{$point->goals}}</td>
								<td>{{$point->goals_conceded}}</td>
								<td>{{$point->clean_sheet}}</td>
								<td>{{$point->red_card}}</td>
								<td>{{$point->yellow_card}}</td>
								<td>{{$point->assist}}</td>
							</tr>
							
						</table>

					</td>
					<td><button class="btn btn-info">{{FHelper::calculateScore($point->id)}}</button></td>
				</tr>
				@endif
				@endforeach
			</table>
			</div>
			
		</div>
	</div>
</div>
@stop

@section('script')
@stop
