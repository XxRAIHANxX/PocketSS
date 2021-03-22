@extends('frontend.template.nav') 
@section('title','Login')

@section('header')
{!!FHelper::breadcrumb('Login')!!}
@stop

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<style>
	body{
		background-image: url("{{url()}}/public/frontend/images/bgss.jpg"); 
		background-repeat: no-repeat;
		background-size: cover;
		}

	/* Style the tab */
	.tab {
		overflow: hidden;	
		
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		background-color: #ccc;
		float: center;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #D7FF00;
		color: white;
	}

	/* Create an active/current tablink class */
	.tab button.active {
		background-color: #D7FF00;
		color: black;
	}

	/* Style the tab content */
	.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
	}
</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js">
</script>
@stop

@section('content')

@foreach (['error', 'warning', 'success', 'info'] as $msg)
	@if(Session::has($msg))
		<script>
		swal({
			title: "{{Session::get($msg)}}",   
			type: "{{$msg}}", 
			});
		</script>
	@endif
@endforeach
@if ($errors->has())
    @foreach ($errors->all() as $error)
		<script>
			swal({
			title: "{{$error}}",   
			type: "error", 
			});
		</script>
    @endforeach
	</div>
@endif

<div class="login">
	<div class="container content" style="text-align: center;">
		<div class="row">
			<p align="center"></p>
			<!-- Tab links -->
			<div class="tab">
				<button class="btn tablinks" onclick="openForm(event, 'Login')" id="defaultOpen">Login</button>
				<button class="btn tablinks" onclick="openForm(event, 'Register')">Register</button>
			</div>
			
			<!-- Tab content -->
			<div id="Register" class="tabcontent">
				<div class="" style="color: white;">
					<form action="{{url()}}/register" method="POST" role="form">
						<div class="form-group text-center">
							<h1 style="color:white">Register</h1>
						</div>

						<div class="form-group">
							<label for="">Profile Name</label>
							<input required="" type="text" name="name" class="form-control" id="" placeholder="Enter profile name.">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input required="" type="text" name="email" class="form-control" id="" placeholder="Enter e-mail address.">
						</div
						
						<div class="form-group">
							<label for=""style="color: white;">Password</label>
							<input required="" type="password" name="password" class="form-control" id="" placeholder="Enter password.">
						</div>

						<div class="form-group">
							<label for=""style="color: white;">Repeat Password</label>
							<input required="" type="password" class="form-control" name="password_confirm" id="password" placeholder="Enter password again.">
						</div>

						<div class="form-group form-inline">
							<label class ="" for="1"style="color: white;">Phone:  +673</label>
							<input required="" type="text" name="telephone" class="form-control" id="1" placeholder="Enter 7 digits mobile number.">
						</div>

						<div class="form-group">
							<label for=""style="color: white;">Date of birth</label>
							<input required="" type="date" name="dob" class="form-control datepicker" id="dob" placeholder="Enter date of birth.">
						</div>
						
						{{-- <div class="form-group">
							<label for=""style="color: white;">Country</label>
							<select class="form-control" id="country" name="country">
								<option value="">- Select country -</option>
								<option value="Brunei">Brunei</option>
								<option value="Malaysia">Malaysia</option>
							</select>
						</div> --}}
						
						<div class="margin-top"></div>
						{{csrf_field()}}
						<button type="submit" style="width:150px" class="btn btn-info">Register</button>
					</form>
				</div>
			</div>
			
			<div id="Login" class="tabcontent">
				<div class=""style="color: white;">
					<form action="{{url()}}/login" method="POST" role="form">
						<div class="form-group text-center">
							<h1 style="color:white">Login</h1>
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input name="email" required="" type="text" class="form-control" id="" placeholder="E-mail Address">
						</div>

						<div class="form-group">
							<label for="">Password</label>
							<input name="password" required="" type="password" class="form-control" id="" placeholder="Password">
						</div>

						<div class="form-group">
							<label><input type="checkbox" name="remember" value="1"> Remember me?</label>
						</div>

						<div class="margin-top"></div>
						{{csrf_field()}}
						<button type="submit" style="width:150px" class="btn btn-info">Login</button>

						<br />
						<a href="{{url()}}/forget" style="color:white; font-size:14px;" >Forget password?</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('script')
<script>
	$( function() {
    	$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat:"dd/mm/yy",
			yearRange: "c-50:c"
    	});
	} );
</script>
<script>
	function openForm(evt, formName) {
	// Declare all variables
	var i, tabcontent, tablinks;

	// Get all elements with class="tabcontent" and hide them
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}

	// Get all elements with class="tablinks" and remove the class "active"
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}

	// Show the current tab, and add an "active" class to the button that opened the tab
	document.getElementById(formName).style.display = "block";
	evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

</script>
@stop