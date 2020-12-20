<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">
    <link rel="icon" href="/hse/build/images/favicon.ico" type="image/ico" />
    <title>@lang('app.appname') </title>



    <!-- Bootstrap -->
    <link href="/hse/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hse/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/hse/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/hse/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/hse/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/hse/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/hse/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/hse/build/css/custom.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    @yield('headercontent')

</head>
<!-- /header content -->

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col hidden-print" style="background:#5cb85c !important;color:#ffffff;  ">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;" style="background:#5cb85c;color:#ffffff;  ">
                        <a href="/home" class="site_title"><i class="fa fa-dashboard"></i>
                            <span>{{\App\AppSetting::first()->title}}</span></a>
                    </div>

                    <div class="clearfix"></div>


                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="@{{asset('uploads/avatars/'.Auth::user()->profile_image)}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>خوش آمدید </span>
                            <h2>{{Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />



                    <!-- sidebar menu -->

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">


                            {!!app('App\Http\Controllers\MenuController')->GetMenuItem()!!}

                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">



                        @guest

                        <a class="nav-link white-text" href="{{ route('login') }}">{{ __('module.login') }}</a>
                        @else
                        <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="خروج" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        @endguest


                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav hidden-print   ">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>

                        </div>



                        <ul class="nav navbar-nav   ">
                            <br>
                            <li class="">

                            {{\App\AppSetting::first()->title}}

                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <li>
                                <a class="dropdown-item white-text" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out pull-right"></i> {{ __('خروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>






                        </ul>


                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- /header content -->

            <!-- page content -->
            @yield('content')
            <!-- /page content -->


            <!-- footer content -->
            <footer class="hidden-print">
                <div class="pull-left">
                {!! \App\AppSetting::first()->copyright !!}
                    
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <div id="lock_screen">
        <table>
            <tr>
                <td>
                    <div class="clock"></div>
                    <span class="unlock">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                            <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                </td>
            </tr>
        </table>
    </div>




    <!-- jQuery -->
    <script src="/hse/vendors/jquery/dist/jquery.min.js"></script>



    <!-- Bootstrap -->
    <script defer src="/hse/vendors/bootstrap/dist/js/bootstrap.min.js"></script>



    @yield('footercontent')
    <!-- Custom Theme Scripts -->
    <script defer src="/hse/build/js/custom.min.js"></script>








</body>

</html>
