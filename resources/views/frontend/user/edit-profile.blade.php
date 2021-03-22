@extends('frontend.template.nav')
@section('title','Edit Profile')
@section('style')
@stop
@section('header')
{!!FHelper::breadcrumb('Edit Profile')!!}
@stop
@section('content')
<div class="container content">
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
		<div class="col-md-4">
			<h3 class="text-center text-danger">Change Avatar</h3>
			<br>
			<form action="{{url()}}/profile/changeavatar" method="POST" enctype="multipart/form-data">
				<div class="border text-center">
					<img id="avatar" class="" style="width: 300px;height: 300px;" src="{{url()}}/{{Auth::user()->pic}}" alt="">
				</div>
				<div class="form-group">
					<input required="" id="newavatar" name="newavatar" type="file" class="form-control">
				</div>
				<div class="form-group text-center">
				{{csrf_field()}}
					<button type="submit" class="btn btn-primary">Change</button>
				</div>
			</form>
		</div>
		<div class="col-md-8">
			<form action="{{url()}}/profile/updateinfo" method="POST" role="form">
				<h3 class="text-center text-danger">Update Profile</h3>

				<div class="form-group">
					<label for="">SS_ID</label>
					<input readonly="" type="email" name="" value="{{FHelper::playerid(Auth::user()->id)}}" class="form-control" id="" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input readonly="" type="email" name="" value="{{Auth::user()->email}}" class="form-control" id="" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="">Telephone</label>
					<input type="text" name="telephone" value="{{Auth::user()->telephone}}" class="form-control" id="" placeholder="Telephone">
				</div>
				<div class="form-group">
					<label for="">DOB</label>
					<input type="text" name="dob" value="{{Auth::user()->dob}}" class="form-control" id="" placeholder="DOB">
				</div>
						<div class="form-group">
					<label for="">Emergency contact</label>
					<input type="text" name="next_kin" value="{{Auth::user()->next_kin}}" class="form-control" id="" placeholder="Next Kin">
				</div>
					<div class="form-group">
					<label for="">Emergency number</label>
					<input type="text" name="nextkin_con" value="{{Auth::user()->nextkin_con}}" class="form-control" id="" placeholder="Next Kin Contact">
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
					<input type="password" name="oldpassword" value="" class="form-control" id="" placeholder="Old Password">
				</div>
				<div class="form-group">
					<label for="">New Password</label>
					<input type="password" name="newpassword" value="" class="form-control" id="" placeholder="New Password">
				</div>
				<div class="form-group">
					<label for="">Repeat Password</label>
					<input type="password" name="" value="" class="form-control" id="" placeholder="Retype New Password">
				</div>
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary">Change Password</button>
			</form>
		</div>
	</div>
</div>
@stop
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