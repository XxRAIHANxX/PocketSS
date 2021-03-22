@extends('frontend.template.nav')
@section('title','My Tokens')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

@stop
@section('header')
{!!FHelper::breadcrumb('My Tokens')!!}
@stop
@section('content')
<div class="container content">
	<div class="row">
		<div class="col-md-4">
			<i style="font-size:300px" class="fa text-info fa-5x fa-credit-card-alt"></i>
			<h3 style="position: absolute; top: 80px; right: 130px; font-size: 37px; color: #ffa019; ">Amount: {{FHelper::wallet()}}</h3>
		</div>
		<div class="col-md-offset-2 col-md-6">
			
			<div class="margin-top"></div>
			<div class="flash-message">
				@foreach (['danger', 'warning', 'success', 'info','popup'] as $msg)
				@if(Session::has($msg) && $msg == 'popup')
				<script>
				swal({
				title:'Thank you for your purchase.',
				text:'{!!Session::get($msg)!!}',
				html:true,
				})</script>
				@elseif(Session::has($msg))
				<div class="alert alert-{{$msg}}">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{{Session::get($msg)}}</strong>
				</div>
				@endif
				@endforeach
			</div>

			<div class="row">
				<div class="col-md-12">
					<h3>Top Up Token</h3>
					<form action="{{url()}}/creditrequest" method="POST" role="form">
						
						<div class="form-group">
							<label for="">Select bundle</label>
							@if(Auth::user()->country=="Brunei")
							<select required id="credit" name="credit" type="text" class="form-control" id="">
								<option value="">- 1 token for 1 game -</option>
								<option value="1" amount="3.00">1 token = $3.00</option>
								<option value="5" amount="15.00">5 tokens = $15.00</option>
								<option value="10" amount="30.00">10 tokens = $30.00</option>
								
							</select>
							
							@endif
						</div>
						<input type="hidden" id="amount" name="amount">
						{{csrf_field()}}
						<button type="submit" class="btn btn-primary">Token Request</button>
					</form>
					<br>
					<h3>Top Up History</h3>
					<a href="{{url()}}/token/history">View history<i class="fa fa-external-link"></i></a>
                    
                	<!--<div class="margin-top"></div>
				<h3>Transfer to friend</h3>
                <form action="{{url()}}/wallet/transfer" method="POST">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Friend's Email</label>
							<input required="" value="{{ old('email') }}" name="email" type="text" class="input-lg form-control" placeholder="E-mail address">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Amount</label>
							<input required="" value="{{ old('amount') }}" name="amount" type="text" class="input-lg form-control" placeholder="Amount">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">&nbsp;</label>
							<br>
							{{csrf_field()}}
							<button type="submit" style="width:100%" class="btn btn-lg btn-info">Transfer</button>
						</div>
					</div>
				</form>-->
               </div>
				
				
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
	$('#credit').on('change',function(){
		$('#amount').val($(this).find(':selected').data('amount'));
	});
</script>
@stop