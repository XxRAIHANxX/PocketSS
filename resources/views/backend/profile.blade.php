@extends('backend.template.index')
@section('title','Profile')
@section('breadcrumb','Profile')
@section('content')
<div class="row">
	<div class="col-md-12">
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
	</div>
</div>
<div class="row">
	<div class="col-md-4 text-center">
		<h3 class="text-center text-danger">Change Avatar</h3>
		<br>
		<form action="{{url()}}/profile/changeavatar" method="POST" enctype="multipart/form-data">
			<div class="border">
				<img id="avatar" class="" style="width: 100%;height: 300px;object-fit: cover;" src="{{url()}}/{{Auth::user()->pic}}" alt="">
			</div>
			<div class="form-group">
				<input required="" id="newavatar" name="newavatar" type="file" class="form-control">
			</div>
			<div class="form-group">
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary">Change</button>
			</div>
		</form>
	</div>
	<div class="col-md-8">
		<form action="{{url()}}/profile/updateinfo" method="POST" role="form">
			<h3 class="text-center text-danger">Update Profile</h3>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input readonly="" type="email" name="" value="{{Auth::user()->email}}" class="form-control" id="" placeholder="Email">
			</div>
			{{csrf_field()}}
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
		<div class="margin-top"></div>
		&nbsp;
		<div class="margin-top"></div>
		<form action="{{url()}}/profile/changepassword" method="POST" role="form">
			<h3 class="text-center text-danger">Change Password</h3>
			<div class="form-group">
				<label for="">Old Password</label>
				<input required type="password" name="oldpassword" value="" class="form-control" id="" placeholder="Old Password">
			</div>
			<div class="form-group">
				<label for="">New Password</label>
				<input required type="password" name="newpassword" value="" class="form-control" id="" placeholder="New Password">
			</div>
			<div class="form-group">
				<label for="">Repeat Password</label>
				<input required type="password" name="" value="" class="form-control" id="" placeholder="Retype New Password">
			</div>
			{{csrf_field()}}
			<button type="submit" class="btn btn-primary">Change Password</button>
		</form>
	</div>
</div>
<div style="margin-top:120px"></div>
@endsection


@section('script')
<script>
	function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#avatar').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
$("#newavatar").change(function(){
readURL(this);
});
</script>
@stop