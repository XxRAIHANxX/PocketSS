@extends('beautymail::templates.sunny')
@section('content')
@include ('beautymail::templates.sunny.heading' , [
'heading' => 'Hi! Admin',
'level' => 'h1',
])
@include('beautymail::templates.sunny.contentStart')
{!! $msg !!}
@include('beautymail::templates.sunny.contentEnd')
@include('beautymail::templates.sunny.button', [
'title' => $linktext,
'link' => url().'/'.$link
])
@stop