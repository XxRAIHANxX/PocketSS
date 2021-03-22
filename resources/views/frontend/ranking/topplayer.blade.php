@extends('frontend.template.index')
@section('title','Top Players')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Top Players ('.(\Session::get("match_type")).')')!!}
@stop
@section('content')
@include('frontend.ranking.category')
<div class="margin-top"></div>
<h1 class="text-center">TOP PLAYERS</h1>
<div class="container">
	<div class="margin-top"></div>
	<div class="row">
		<div class="col-md-6">
			<table class="table table-striped">
				<tr>
					<th>Sr.</th>
					<th width="250px">Name</th>
					<th>POINTS</th>
				</tr>
				<?php $i=1; ?>
				@foreach(FHelper::topplayers(10) as $scorer)
				<tr>
					<td>{{$i}}</td>
					<td>{{$scorer->name}}</td>
					<td>{{$scorer->total}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
			</table>
		</div>
		<div class="col-md-6">
			<table class="table table-striped">
				<tr>
					<th>Sr.</th>
					<th width="250px">Name</th>
					<th>POINTS</th>
				</tr>
				<?php $i=11; ?>
				@foreach(FHelper::topplayers(10,10) as $scorer)
				<tr>
					<td>{{$i}}</td>
					<td>{{$scorer->name}}</td>
					<td>{{$scorer->total}}</td>
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