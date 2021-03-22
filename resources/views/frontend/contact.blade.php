@extends('frontend.template.nav')
@section('title','Contact')
@section('header')
{!!FHelper::breadcrumb('Contact Us')!!}
@stop
@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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

<div class="container content">
	<div class="row">
		<div class="col-md-8">
			<h3>Fill the form to send us message!</h3>
			<form action="" method="POST" role="form">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" id="name" placeholder="Name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="Emal">
				</div>
				<div class="form-group">
					<label for="contact">Contact</label>
					<input type="text" name="contact" class="form-control" id="contact" placeholder="Contact">
				</div>
				<div class="form-group">
					<label for="subject">Subject</label>
					<input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea rows="10" type="text" name="message" class="form-control" id="message" placeholder="Message"></textarea>
				</div>
				<div class="form-group text-right">
				{{csrf_field()}}
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>
		</div>
		<div class="col-md-4">
			<h3>Our Address</h3>
			<p>
				<i class="fa fa-map-marker"></i> Block B28, Simpang 32-37
				<br>
				Kampung Anggerek Desa<br>Jalan Berakas
				<br>BB3713<br>Brunei Darussalam
			</p>
			{{-- <p>
				<i class="fa fa-phone"></i> +1 734-332-6500
			</p> --}}
			<p>
				<i class="fa fa-envelope"></i> info@wwstadium.com
			</p>
			<div class="clearfix margin-top"></div>
			<h3>Find us on map</h3>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3975.0124269814387!2d114.9409917140323!3d4.937564396415312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3222f5aedf64c2fd%3A0xa1a24353911c1fe9!2sSimpang+32-37%2C+Bandar+Seri+Begawan+BB3713%2C+Brunei!5e0!3m2!1sen!2sin!4v1470420984005" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>
@stop
@section('script')
@stop