@extends('frontend.template.nav')
@section('title','Forget Password')
@section('header')
{!!FHelper::breadcrumb('Forget Password')!!}
@stop
@section('style')
<style>
	body{
		background-image: url("{{url()}}/public/frontend/images/bgss.jpg"); 
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
@stop
@section('content')
<div class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="login-panel">
					<form action="{{url()}}/password/email" method="POST" role="form">
					@if (count($errors) > 0)
					<ul>
						@foreach ($errors->all() as $error)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>{{ $error }}</strong>
						</div>
						@endforeach
					</ul>
					@endif
					@if(Session::has('status'))
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>{{Session::get('status')}}</strong>
					</div>
					@endif
						<div class="form-group text-center">
							<h1 style="color:white">Forget Password</h1>
						</div>
						<br /><br />
						<div class="form-group text-center">
							<img src="{{url()}}/sssicon.png" alt="">
						</div>
						<div class="form-group">
							<label for=""style="color:white;">Email</label>
							<input name="email" type="text" class="form-control" id="" placeholder="E-mail Address">
						</div>
						<div class="margin-top"></div>
						<div class="form-group text-center">
							{{csrf_field()}}
							<button type="submit" style="" class="btn btn-info">Reset Email</button>
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