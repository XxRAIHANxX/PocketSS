<aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
  <div class="user">
    <div id="esp-user-profile" data-percent="100" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart"><img src="{{url()}}/{{Auth::user()->pic}}" alt="" class="avatar img-circle"></div>
    <h4 class="fs-16 mt-15 mb-5 fw-300">{{Auth::user()->name}}</h4>
    <p class="mb-0 text-muted">Super Admin</p>
  </div>
  <ul class="list-unstyled navigation mb-0">
    <li class="sidebar-category pt-0">Main</li>
    <li><a href="{{url()}}/backend" class="bubble"><i class="ti-home"></i><span class="sidebar-title">Dashboard</span></a></li>
    <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#users" aria-expanded="false" aria-controls="collapse2" class="collapsed"><i class="ti-user"></i><span class="sidebar-title">Users</span></a>
    <ul id="users" class="list-unstyled collapse" aria-expanded="false" style="height: 0px;">
      <li><a href="{{url()}}/backend/users/add">Add User</a></li>
      <li><a href="{{url()}}/backend/users/manage">Manage Users</a></li>
    </ul>
  </li>
  <li><a href="{{url()}}/backend/timeslot" class="bubble"><i class="ti-time"></i><span class="sidebar-title">Timeslot</span></a></li>
  <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#bookings" aria-expanded="false" aria-controls="collapse2" class="collapsed"><i class="fa fa-edit"></i><span class="sidebar-title">Bookings</span></a>
    <ul id="bookings" class="list-unstyled collapse" aria-expanded="false" style="height: 0px;">
    <li><a href="{{url()}}/backend/bookings" class="bubble">View Bookings</a></li>      
    <li><a href="{{url()}}/backend/bookings/make">Make Booking</a></li>
    <li><a href="{{url()}}/backend/bookings/pending">Pending Payments <span class="badge badge-danger">{{BHelper::pendingpaymentcount()}}</span></a></li>
    </ul>
  </li>
  
  <li><a href="{{url()}}/backend/wallet/requests" class="bubble"><i class="fa fa-credit-card"></i><span class="sidebar-title">Credit Request</span></a></li>
  {{--   
  <li><a href="{{url()}}/backend/wallet" class="bubble"><i class="fa fa-credit-card"></i><span class="sidebar-title">Wallet</span></a></li>
  --}}  
 <li><a href="{{url()}}/backend/scores" class="bubble"><i class="fa fa-list-alt"></i><span class="sidebar-title">Today's Scores</span></a></li>
  <li><a href="{{url()}}/backend/logout" class="bubble"><i class="fa fa-sign-out"></i><span class="sidebar-title">Logout</tspan></a></li>
</ul>
</aside>