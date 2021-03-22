@extends('frontend.template.index')
@section('title','Top Scorer')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Top Scorer ('.(\Session::get("match_type")).')')!!}
@stop
@section('content')
@include('frontend.ranking.category')
<div class="margin-top"></div>
<h1 class="text-center">TOP SCORER</h1>
<div class="container">
	<div class="margin-top"></div>
	<div class="row">
		<div class="col-md-6">
			<div class="responsive-table">
				<table class="table table-striped">
					<tr>
						<th>Sr.</th>
						<th width="250px">Name</th>
						<th>TOTAL GAMES PLAYED</th>
						<th>TOTAL GOALS</th>
					</tr>
					<?php $i=8; ?>
					@foreach(FHelper::topscores(10) as $scorer)
					<tr>
						<td>{{$i}}</td>
						<td>{{$scorer->name}}</td>
						<td>{{FHelper::matches($scorer->id)}}</td>
						<td>{{FHelper::score($scorer->id , 'goals')}}</td>
					</tr>
					<?php $i++; ?>
					@endforeach
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<table class="table table-striped">
				<tr>
					<th>Sr.</th>
					<th width="250px">Name</th>
					<th>TOTAL GAMES PLAYED</th>
					<th>TOTAL GOALS</th>
				</tr>
				<?php $i=18; ?>
				@foreach(FHelper::topscores(10,10) as $scorer)
				<tr>
					<td>{{$i}}</td>
					<td>{{$scorer->name}}</td>
					<td>{{FHelper::matches($scorer->id)}}</td>
					<td>{{FHelper::score($scorer->id , 'goals')}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
			</table>
		</div>
	</div>
</div>
<div class="margin-top"></div>
@stop
@section('script')
@stop