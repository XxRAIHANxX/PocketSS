<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Weekend Warriors</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/css/first-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url({{url()}}/public/backend-assets/images/backgrounds/20.jpg)" class="body-bg-full v2">
    <div class="container page-container">
      <div class="page-content">
        <div class="v2">
        <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
        <div class="alert alert-{{$msg}}">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{Session::get($msg)}}</strong>
        </div>
        @endif
        @endforeach
      </div>
        {{-- <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error</strong> Username & password is incorrect!
        </div> --}}
          <!-- <div class="logo"><img src="{{url()}}/logo.png" alt=""></div> -->
          <form method="POST" action="login" class="form-horizontal">
            <div class="form-group">
              <div class="col-xs-12">
                <input type="text" autocomplete="off" name="username" placeholder="Username" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <input type="password" autocomplete="off" name="password" placeholder="Password" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <div class="checkbox-inline checkbox-custom pull-left">
                  <input id="exampleCheckboxRemember" name="remember" type="checkbox" value="1">
                  <label for="exampleCheckboxRemember" class="checkbox-muted text-muted">Remember me</label>
                </div>
                <div class="pull-right"></div>
              </div>
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  <script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap JavaScript-->
  <script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Custom JS-->
  <script type="text/javascript" src="{{url()}}/public/backend-assets/js/first-layout/extra-demo.js"></script>
</body>
</html>