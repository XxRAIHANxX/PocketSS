@extends('beautymail::templates.sunny')
@section('content')
@include ('beautymail::templates.sunny.heading' , [
'heading' => 'Hi! '.$user['name'],
'level' => 'h1',
])
@include('beautymail::templates.sunny.contentStart')
<p>Thanks for registering on Super Squad. Your login details are as follow:</p>
<p>Email: {{$user['email']}}</p>
<br>
@include('beautymail::templates.sunny.contentEnd')
@include('beautymail::templates.sunny.button', [
'title' => 'Access Account',
'link' => url().'/profile'
])
@stop