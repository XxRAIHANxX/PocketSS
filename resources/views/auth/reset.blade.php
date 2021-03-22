@extends('frontend.template.nav')
@section('title','Reset Password')
@section('header')
{!!FHelper::breadcrumb('Reset Password')!!}
@stop
@section('style')
<style>
body{
	background: url('http://azexo.com/sportak/wp-content/uploads/2015/10/slider-e1445958389451.jpg');
	background-position:center;
	/*background-attachment:fixed; */
}
</style>
@stop
@section('content')
<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="login-panel">
					<form action="{{url()}}/password/reset" method="POST" role="form">
					@if (count($errors) > 0)
					<ul>
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>{{ $error }}</strong>
						</div>
						@endforeach
					</ul>
					@else
					
					@endif
						<div class="form-group text-center">
							<h1 style="color:white">Reset Password</h1>
						</div>
						<div class="form-group text-center">
							<img src="{{url()}}/sssicon.png" alt="">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input name="password" type="password" class="form-control" id="" placeholder="New Password">
						</div>
						<div class="form-group">
							<label for="">Repeat Password</label>
							<input name="password_confirmation" type="password" class="form-control" id="" placeholder="Repeat Password">
						</div>
						<div class="margin-top"></div>
						<div class="form-group text-center">
						<input type="hidden" name="token" value="{{$token}}">
						<input type="hidden" name="email" value="{{$_GET['email']}}">
							{{csrf_field()}}
							<button type="submit" style="" class="btn btn-info">Reset Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@stop