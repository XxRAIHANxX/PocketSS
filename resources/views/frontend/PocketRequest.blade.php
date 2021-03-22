@extends('frontend.template.nav') 
@section('title','Pocket Merchant') 

@section('style')
  
@stop

@section('header')
{!!FHelper::breadcrumb('Pocket Merchant')!!}
@stop

@section('content')

<head>
	<meta charset="UTF-8">
	<title>Pocket Checkout Form</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<link rel="stylesheet" href="/frontend/css/Pocketstyle.css">

</head>

<div class="container content" style="text-align: center;">
       <img src="/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>

       <div class="wrapper">
            <div class="payment">
                <div class="payment-logo">
                <p>p</p>
                </div>
                
                
                <h2>Pocket Gateway</h2>
                <div class="form">
                <div class="card space icon-relative">
                    
                    <input type="hidden" class="input" placeholder="Reference Number"disabled>
                </div>
                <div class="card space icon-relative">
                    
                    <input type="hidden" class="input" placeholder="Phone Number"disabled>
                </div>
                <div class="card space icon-relative">
                    <label class="label">Transaction Amount</label>
                    <input type="text" class="input" placeholder="Transaction Amount"disabled>
                    <i class="far fa-credit-card"></i>
                </div>
                    
                <button class="btn" type="button" onclick="alert('Pocket Processing')" >PAY</button>
                
                </div>
               
                
            </div>
        </div>



       <img src="/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop

@section('script') 
@stop
