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
            <form action="#" method="GET">
                <div class="payment">
                    <div class="payment-logo">
                    <p>p</p>
                    </div>
                    
                    
                    <h2>Pocket Gateway</h2>
                    <div class="form">
                    <h1>Purchased Unsuccessful</h1>    
                    <button class="btn" type="button" >Continue</button>
                    
                    </div>
                </div>
            </form>
        </div>





       <img src="/frontend/images/2021/divider.png" width="" height="" alt="Line divider"/>
</div>
@stop

@section('script') 
@stop
