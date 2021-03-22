<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Super Squad</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/favicon.png">
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/animo.js/animate-animo.min.css">
    <!-- Flag Icons-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Toastr-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/toastr/toastr.min.css">
    <!-- SpinKit-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/SpinKit/css/spinners/7-three-bounce.css">
    <!-- Jvector Map-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- Morris Chart-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/morris.js/morris.css">
    <!-- DataTables-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
    <!-- Weather Icons-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/weather-icons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/weather-icons/css/weather-icons.min.css">
    <!-- FullCalendar-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/fullcalendar/dist/fullcalendar.print.css" media="print">
    <!-- jQuery MiniColors-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/jquery-minicolors/jquery.minicolors.css">
    <!-- Bootstrap Date Range Picker-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/plugins/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/css/first-layout.css">
    @yield('style')
    <link rel="stylesheet" type="text/css" href="{{url()}}/public/backend-assets/css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <!-- Header start-->
    <header>
      <div class="search-bar closed">
        <form>
          <div class="input-group input-group-lg">
            <input type="text" placeholder="Search for..." class="form-control"><span class="input-group-btn">
          <button type="button" class="btn btn-default search-bar-toggle"><i class="ti-close"></i></button></span>
        </div>
      </form>
      </div><a href="{{url()}}/backend" class="brand pull-left"><img src="{{url()}}/sssicon.png" alt="" width="50"> Super Squad</a><a href="javascript:;" role="button" class="hamburger-menu pull-left"><span></span></a>
      <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
        <li class=""><a href="{{url()}}" target="_blank" role="button" class="header-icon"><i class="ti-desktop"></i></a></li>
        <li class="dropdown"><a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span class="badge bg-danger">{{App\User::find(Auth::user()->id)->countNotificationsNotRead()}}</span></a>
       
      </li>
      <li class="dropdown visible-lg visible-md"><a id="dropdownMenu2" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle header-icon lh-1 pt-15 pb-15">
        <div class="media mt-0">
          <div class="media-left avatar"><img src="{{url()}}/{{Auth::user()->pic}}" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
          <div class="media-right media-middle pl-0">
            <p class="fs-12 mb-0">Hi, {{Auth::user()->name}}</p>
          </div>
        </div></a>
        <ul aria-labelledby="dropdownMenu2" class="dropdown-menu fs-12 animated fadeInDown">
          <li><a href="{{url()}}/backend/profile"><i class="ti-user mr-5"></i> Edit Profile</a></li>
        </ul>
      </li>
      <li class=""><a href="{{url()}}/backend/logout" target="" role="button" class="header-icon"><i class="fa fa-sign-out"></i></a></li>
    </ul>
  </header>
  <!-- Header end-->
  <div class="main-container">
    <!-- Main Sidebar start-->
    @include('backend.template.sidebar')
  </div>
  <!-- Main Sidebar end-->
  <div class="page-container">
    <div class="page-header clearfix">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="mt-0 mb-5">@yield('title')</h4>
          <ol class="breadcrumb">
            <li><a href="{{url()}}/backend"><i class="ti-home mr-5"></i> Home</a></li>
            <li class="active">@yield('breadcrumb')</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="page-content container-fluid">
      @yield('content')
    </div>
  </div>
</div>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap JavaScript-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Malihu Scrollbar-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- Animo.js-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/animo.js/animo.min.js"></script>
<!-- Bootstrap Progressbar-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- jQuery Easy Pie Chart-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- Toastr-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/toastr/toastr.min.js"></script>
<!-- MomentJS-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/moment/min/moment.min.js"></script>
<!-- jQuery BlockUI-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/blockUI/jquery.blockUI.js"></script>
<!-- jQuery Counter Up-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery-waypoints/waypoints.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/Counter-Up/jquery.counterup.min.js"></script>
<!-- Jvector Map-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jvectormap/maps/jquery-jvectormap-world-mill.js"></script>
<!-- Flot Charts-->
<!--[if lte IE 8]>
<script type="text/javascript" src="https://raw.githubusercontent.com/flot/flot/master/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/flot/jquery.flot.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/flot.curvedlines/curvedLines.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<!-- Morris Chart-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/raphael/raphael-min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/morris.js/morris.min.js"></script>
<!-- DataTables-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jszip/dist/jszip.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<!-- jQuery UI-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- FullCalendar-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- jQuery MiniColors-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
<!-- Bootstrap Date Range Picker-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- Custom JS-->
<script type="text/javascript" src="{{url()}}/public/backend-assets/js/first-layout/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/js/first-layout/demo.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.5.3/jquery.timeago.min.js"></script>
<script type="text/javascript" src="{{url()}}/public/backend-assets/js/custom.js"></script>
@yield('script')
</body>
</html>