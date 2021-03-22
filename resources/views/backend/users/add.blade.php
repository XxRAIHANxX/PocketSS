@extends('backend.template.index')
@section('title','Add User')
@section('breadcrumb','Add User')
@section('content')
<div class="row">
	<div class="col-md-offset-3 col-md-6">
		<form action="" method="POST" role="form">
			<legend>Add New User</legend>
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
			<div class="form-group">
				<label for="">Name</label>
				<input required="" type="text" name="name" class="form-control" id="" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input required="" type="email" name="email" class="form-control" id="" placeholder="Email">
			</div>
			<div class="form-group text-center">
			<input type="hidden" name="password" value="{{rand(10000,99999)}}">
			{{csrf_field()}}
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</form>
	</div>
</div>
@stop
@section('script')
@stop