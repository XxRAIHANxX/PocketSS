@extends('frontend.template.nav')
@section('title','Page Not Found')
@stop

@section('content')
<div class="container page-container">
      <div class="page-content">
        <div class="logo"><img src="../build/images/logo/logo-iconic-light.png" alt="" width="100"></div>
        <h1 style="font-size: 130px" class="m-0 text-muted fw-300">4<i class="ti-face-sad fs-100"></i><i class="ti-face-sad fs-100"></i></h1>
        <h4 class="fs-16 text-white fw-300">Oh-no!</h4>
        <p class="text-muted mb-15">Look like you're lost! We can't seem to find the page you're looking for.</p><a href="index.html" role="button" style="width: 130px" class="btn btn-primary btn-rounded">Return home</a>
      </div>
    </div>
@stop