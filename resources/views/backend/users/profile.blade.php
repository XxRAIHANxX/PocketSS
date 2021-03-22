@foreach($users as $user)
@endforeach
@extends('backend.template.index')
@section('title',$user->name.' Profile')
@section('breadcrumb',$user->name.' Profile')
@section('content')
<div class="row">
	<div class="col-md-offset-2 col-md-8">
		<div class="col-md-3">
			<img src="{{url()}}/{{$user->pic}}" class="img-responsive" alt="">
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<tr>
					<td>Name:</td>
					<td>{{$user->name}}</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>{{$user->email}}</td>
				</tr>
				<tr>
					<td>Why Join Us:</td>
					<td>{{$user->quote}}</td>
				</tr>
				<tr>
					<td>Wallet:</td>
					<td>{{FHelper::wallet($user->id)}}</td>
				</tr>
				<tr>
					<td>Points:</td>
					<td>{{FHelper::points($user->id)}}</td>
				</tr>
				<tr>
					<td>Matches Played:</td>
					<td>{{FHelper::matches($user->id)}}</td>
				</tr>
			</table>
		</div>
	</div>
</div>
@stop
@section('script')
@stop