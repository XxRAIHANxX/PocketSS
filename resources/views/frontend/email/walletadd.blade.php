@foreach($users as $user)
@endforeach
@extends('beautymail::templates.sunny')
@section('content')
@include ('beautymail::templates.sunny.heading' , [
'heading' => 'Hi! '.$user->name,
'level' => 'h1',
])
@include('beautymail::templates.sunny.contentStart')

<p>Congratulations! Your request of <b>{{$credit}}</b> tokens has been approved & credited to your profile.</p>
@include('beautymail::templates.sunny.contentEnd')
@include('beautymail::templates.sunny.button', [
'title' => 'View Wallet',
'link' => url().'/wallet'
])
@stop