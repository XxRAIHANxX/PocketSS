<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password - Weekend Warriors</title>
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
          <div class="logo"><img src="{{url()}}/logo.png" alt="" width=""></div>
          <h4 class="fs-16 fw-300 mt-0">Forgot Password</h4>
          <p class="text-muted">Enter the email address associated with your account to reset your password</p>
          <form method="POST" action="">
            <div class="form-group">
              <input type="text" name="username" placeholder="Enter Username" class="form-control">
            </div>
            {{csrf_field()}}
            <button type="submit" style="width: 130px" class="btn btn-primary btn-rounded">Reset</button>
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