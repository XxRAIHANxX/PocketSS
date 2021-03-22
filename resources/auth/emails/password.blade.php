@extends('beautymail::templates.sunny')
@section('content')
@include ('beautymail::templates.sunny.heading' , [
'heading' => 'Hi! ',
'level' => 'h1',
])
@include('beautymail::templates.sunny.contentStart')
<p>Use the following link to reset your password:</p>
<p>Email: {{$user['email']}}</p>
@include('beautymail::templates.sunny.contentEnd')
@include('beautymail::templates.sunny.button', [
'title' => 'Reset Your Password',
'link' => url('password/reset/'.$token)
])
@stop