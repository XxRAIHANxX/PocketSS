<!DOCTYPE html>
<html lang="en-US">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>@yield('title') | Super Squad Soccer</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url()}}/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/azexo.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    @yield('style')
    <link rel="stylesheet" href="/frontend/css/js_composer.min.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
      @font-face {
        font-family: myFirstFont;
        src:url("{{url()}}/public/frontend/fonts/American_Captain.ttf") format("truetype");
      }
      .capt{
        font-family: myFirstFont;
        color: #ffffff;
        font-size: 22px;
      }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LGGF9QNN4T"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-LGGF9QNN4T');
    </script>  
  </head>
  <body class="home page page-id-2 page-template-default wpb-js-composer js-comp-ver-4.8.0.1 vc_responsive">
    <div id="page" class="hfeed site">
      <header id="masthead" class="site-header clearfix" style="background-color: silver;">
        <div id="secondary" class="sidebar-container container" role="complementary">
          <div class="sidebar-inner">
            <div class="widget-area clearfix">
              <div id="vc_widget-2" class="widget-1 widget-first widget-last widget-odd widget widget_vc_widget">
                <div class="scoped-style">
                  <div class="vc_row wpb_row vc_row-fluid vc_custom_1444144697786">
                    <div class="row" >
                      <div class="h-padding-0 wpb_column vc_column_container vc_col-xl-8">
                        <div class="wpb_wrapper">
                          <div class="panel social" >
                            <div class="panel-content">
                              <!-- fb entry -->
                              <div class="entry ">
                                <div class="entry-icon">
                                  <a class="" href="https://facebook.com/SuperSquadSoccer/"><span class="fa fa-facebook" style="align-content: right;"></span></a>
                                </div>
                                {{-- <div class="entry-data">
                                  <div class="entry-header">
                                  </div>
                                </div> --}}
                              </div>
                              <!-- yt entry -->
                              <div class="entry ">
                                <div class="entry-icon">
                                  <a class="" href="https://youtube.com/channel/UCFDJqsAWH2joOZh0IOr_s3w/"><span class="fa fa-youtube" style="align-content: right;"></span></a>
                                </div>
                                {{-- <div class="entry-data">
                                  <div class="entry-header">
                                  </div>
                                </div>--}}
                              </div> 
                              <!-- ig entry -->
                              <div class="entry ">
                                <div class="entry-icon">
                                  <a class="" href="https://instagram.com/supersquadbn/"><span class="fa fa-instagram" style="align-content: right;"></span></a>
                                </div>
                                {{-- <div class="entry-data">
                                  <div class="entry-header">
                                  </div>
                                </div> --}}
                              </div>
                              <!-- wa entry -->
                              <div class="entry ">
                                <div class="entry-icon">
                                  <a class="" href="https://api.whatsapp.com/send?phone=6738237789"><span class="fa fa-phone" style="align-content: right;"></span></a>
                                </div>
                                {{-- <div class="entry-data">
                                  <div class="entry-header">
                                  </div>
                                </div> --}}
                              </div>
                              <!-- tnc entry -->
                              <div class="entry ">
                                {{-- <div class="entry-icon">
                                </div>  --}}
                                <div class="entry-data">
                                  <div class="entry-header">
                                    <a href="{{url()}}/tnc" style="font-size: 114px2px;align-content: right;" >T&C</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- .widget-area -->
            </div>
            <!-- .sidebar-inner -->
          </div>
          <!-- #secondary -->
        </div>

<div class="header-main clearfix">
  <div class="container">
    <a class="site-title" href="{{url()}}" rel="home" ><img src="{{url()}}/public/frontend/images/2021/logo-final.png" style="width: auto; max-height: 150px; left: -30px; top:-45px;" alt="logo">
    </a>
    <div class="mobile-menu-button"><span><i class="fa fa-bars"></i></span>
  </div>
  <nav class="site-navigation mobile-menu">
    <div class="menu-primary-container">
      <ul id="primary-menu-mobile" class="nav-menu">
        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-491">
          <a href="{{url()}}/" class="menu-link">Home</a>
        </li>

        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
          <a href="" class="menu-link">Notice</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/how-to-play" class="menu-link">How To Play</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/covid" class="menu-link">COVID-19 Procedures</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/tnc" class="menu-link">Terms & Conditions</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/cancel" class="menu-link">Cancellation Policy</a>
              </li>
              
            </ul>
        </li>

        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
          <a href="" class="menu-link">Solo Games</a>
          <ul class="sub-menu">
            <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
              <a href="" class="menu-link">MON 15 Mar</a>
              <ul class="sub-menu">
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/ppsb/timeslot1" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                </li>
                {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ubd/timeslot1" class="menu-link">UBD (7-9 PM | 9v9)</a>
                  </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/isb/timeslot1" class="menu-link">ISB (8-10 PM | 9v9)</a>
                </li> --}}
              </ul>
            </li>
            <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
              <a href="" class="menu-link">WED 17 Mar</a>
                <ul class="sub-menu">
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ppsb/timeslot2" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                  </li>
                  {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ubd/timeslot2" class="menu-link">UBD (7-9 PM | 9v9)</a>
                  </li>
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/isb/timeslot2" class="menu-link">ISB (8-10 PM | 9v9)</a>
                  </li> --}}
                </ul>
            </li>
            <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
              <a href="" class="menu-link">FRI 19 Mar</a>
              <ul class="sub-menu">
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/ppsb/timeslot3" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                </li>
                {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/ubd/timeslot3" class="menu-link">UBD (7-9 PM | 9v9)</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/isb/timeslot3" class="menu-link">ISB (8-10 PM | 9v9)</a>
                </li> --}}
              </ul>
            </li>
          </ul>
        </li>
        
        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-476">
            <a href="" class="menu-link">Team Games</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/team/schedule" class="menu-link">Schedule</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="" class="menu-link">Online Booking Coming Soon</a>
              </li>
              {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/team/register" class="menu-link">Register Team</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/team/book" class="menu-link">Book Team Games</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/team/leaderboard" class="menu-link">View Team Leaderboard</a>
              </li> --}}
            </ul>
        </li>

        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
          <a href="" class="menu-link">Rankings</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="" class="menu-link">Coming Soon</a>
              </li>
              {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/topplayer" class="menu-link">Top Player</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/topgoalie" class="menu-link">Top Goalie</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/topscorer" class="menu-link">Top Scorer</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/topscorer" class="menu-link">Top Assist</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/mostactive" class="menu-link">Most Active</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/leaderboard/season1" class="menu-link">Leaderboard Season 1 2021</a>
              </li> --}}
            </ul>
        </li>

        @if(Auth::check())
        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-476">
          <a href="#menu" class="menu-link">Hi, {{Auth::user()->name}}</a>
          <ul class="sub-menu">
            <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-2  menu-item-640">
              <a href="{{url()}}/profile" class="menu-link">Edit Profile</a>
            </li>
            <li id="menu-item-489" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-489">
              <a href="{{url()}}/bookings" class="menu-link">My Bookings</a>
            </li>
            <li id="menu-item-532" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-532">
              <a href="{{url()}}/token" class="menu-link">My Tokens ({{FHelper::wallet()}})</a>
            </li>
            <li id="menu-item-532" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-532">
              <a href="{{url()}}/points" class="menu-link">My Scores ({{FHelper::points()}})</a>
            </li>
            <li id="menu-item-488" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-488">
              <a href="{{url()}}/logout" class="menu-link">Logout</a>
            </li>
          </ul>
        </li>
        @else
        <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
          <a href="{{url()}}/login" class="menu-link">Login | Register</a>
          <ul class="sub-menu">
            <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-2  menu-item-640">
              <a href="{{url()}}/forget" class="menu-link">Forget Password?</a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </nav>

  <nav class="site-navigation primary-navigation">
    <div class="menu-primary-container">
      <ul id="primary-menu" class="nav-menu">
        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-491">
          <a href="{{url()}}/" class="menu-link">Home</a>
        </li>

        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
          <a href="" class="menu-link">Notice</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/how-to-play" class="menu-link">How To Play</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/covid" class="menu-link">COVID-19 Procedures</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/tnc" class="menu-link">Terms & Conditions</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/cancel" class="menu-link">Cancellation Policy</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/PocketRequest" class="menu-link">PocketRequest</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/PocketRespond" class="menu-link">PocketRespond Successful</a>
              </li>
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                <a href="{{url()}}/PocketRespondUS" class="menu-link">PocketRespond Unsuccessful</a>
              </li>
            </ul>
        </li>

        <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
            <a href="" class="menu-link">Solo Games</a>
            <ul class="sub-menu">
              <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
                <a href="" class="menu-link">MON 15 Mar</a>
                <ul class="sub-menu">
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ppsb/timeslot1" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                  </li>
                  {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                      <a href="{{url()}}/ubd/timeslot1" class="menu-link">UBD (7-9 PM | 9v9)</a>
                    </li>
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/isb/timeslot1" class="menu-link">ISB (8-10 PM | 9v9)</a>
                  </li> --}}
                </ul>
              </li>
              <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
                <a href="" class="menu-link">WED 17 Mar</a>
                  <ul class="sub-menu">
                    <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                      <a href="{{url()}}/ppsb/timeslot2" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                    </li>
                    {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                      <a href="{{url()}}/ubd/timeslot2" class="menu-link">UBD (7-9 PM | 9v9)</a>
                    </li>
                    <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                      <a href="{{url()}}/isb/timeslot2" class="menu-link">ISB (8-10 PM | 9v9)</a>
                    </li> --}}
                  </ul>
              </li>
              <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
                <a href="" class="menu-link">FRI 19 Mar</a>
                <ul class="sub-menu">
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ppsb/timeslot3" class="menu-link">PPSB (7-9 PM | 9v9)</a>
                  </li>
                  {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="{{url()}}/ubd/timeslot3" class="menu-link">UBD (7-9 PM | 9v9)</a>
                  </li>
                  <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                      <a href="{{url()}}/isb/timeslot3" class="menu-link">ISB (8-10 PM | 9v9)</a>
                  </li> --}}
                </ul>
              </li>
            </ul>
          </li>
          
          <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-476">
              <a href="" class="menu-link">Team Games</a>
              <ul class="sub-menu">
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/team/schedule" class="menu-link">Schedule</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                    <a href="" class="menu-link">Online Booking Coming Soon</a>
                </li>
                {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/team/register" class="menu-link">Register Team</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/team/book" class="menu-link">Book Team Games</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/team/leaderboard" class="menu-link">View Team Leaderboard</a>
                </li> --}}
              </ul>
          </li>
  
          <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
            <a href="" class="menu-link">Rankings</a>
              <ul class="sub-menu">
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                   <a href="" class="menu-link">Coming Soon</a>
                </li>
                {{-- <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/topplayer" class="menu-link">Top Player</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/topgoalie" class="menu-link">Top Goalie</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/topscorer" class="menu-link">Top Scorer</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/topscorer" class="menu-link">Top Assist</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/mostactive" class="menu-link">Most Active</a>
                </li>
                <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page  page_item page-item-2 menu-item-640">
                  <a href="{{url()}}/leaderboard/season1" class="menu-link">Leaderboard Season 1 2021</a>
                </li> --}}
              </ul>
          </li>
  
          @if(Auth::check())
          <li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-476">
            <a href="#menu" class="menu-link">Hi, {{Auth::user()->name}}</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-2  menu-item-640">
                <a href="{{url()}}/profile" class="menu-link">Edit Profile</a>
              </li>
              <li id="menu-item-489" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-489">
                <a href="{{url()}}/bookings" class="menu-link">My Bookings</a>
              </li>
              <li id="menu-item-532" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-532">
                <a href="{{url()}}/token" class="menu-link">My Tokens ({{FHelper::wallet()}})</a>
              </li>
              <li id="menu-item-532" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-532">
                <a href="{{url()}}/points" class="menu-link">My Scores ({{FHelper::points()}})</a>
              </li>
              <li id="menu-item-488" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-488">
                <a href="{{url()}}/logout" class="menu-link">Logout</a>
              </li>
            </ul>
          </li>
          @else
          <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-492">
            <a href="{{url()}}/login" class="menu-link">Login | Register</a>
            <ul class="sub-menu">
              <li id="menu-item-640" class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-2  menu-item-640">
                <a href="{{url()}}/forget" class="menu-link">Forget Password?</a>
              </li>
            </ul>
          </li>
          @endif
          
      </ul>
    </div>
  </nav>
</div>
</div>
@yield('header')
</div>
@yield('content')
<footer id="colophon" class="site-footer clearfix">
<br /><br />
<!-- <a href=""><img src="{{url()}}/public/frontend/images/footer.png"  style="width: 100%; height: auto;"></a>  <br> -->
</footer>
</div>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/azwoo.js?ver=1.12'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/jquery.countdown.min.js?ver=1.12'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/azexo.js?ver=1.12'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/owl.carousel.min.js?ver=1.12'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/jquery.magnific-popup.min.js?ver=1.12'></script>
<script type='text/javascript' src='http://azexo.com/sportak/wp-includes/js/masonry.min.js?ver=3.1.2'></script>
<script type='text/javascript' src='{{url()}}/public/frontend/js/jquery.flexslider-min.js?ver=4.3.3'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.8/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
  //<![CDATA[
  $(window).load(function(){
    var $existTable= $('table td table');
    var $newTable = $('<table id="newTable"><thead></thead><tbody></tbody></table>');
    $newTable.find('thead').append($existTable.find('tr').eq(2));
    $newTable.find('tbody').append($existTable.find('tr:gt(1)'));
    $existTable.parent().append( $newTable );
    $newTable.tablesorter({
      // initial sort order setting
      sortList: [[3,1]],
      // pass the headers argument and passing a object
      headers: {
        3: {
          sorter: false
        }
      }
    });
  });
  //]]>
</script>
@yield('script')
</body>
</html>