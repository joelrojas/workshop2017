<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/paper-dashboard-pro/examples/dashboard/stats.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2017 00:18:10 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Club Gitana</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="../assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/themify-icons.css" rel="stylesheet">
    @yield('css')
</head>

<body >
<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <div class="logo">
            <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
                CG
            </a>

            <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
                CLUB GITANA
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{ asset('assets/img/faces/face-2.jpg') }}" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
								{{ Auth()->user()->email }}
		                        <b class="caret"></b>
							</span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="sidebar-mini">Mp</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="sidebar-mini">Ep</span>
                                    <span class="sidebar-normal">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">Settings</span>
                                </a>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off icon"></i>Cerrar Sesión</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                        <a href="{{ route('register') }}">Register</a>
                                        @endauth
                                    @endif
                        </ul>
                    </div>
                </div>
            </div>
            @include('layouts.menu')
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#Dashboard">
                        Stats
                    </a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <span class="notification">5</span>
                                <p class="hidden-md hidden-lg">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#not1">Notification 1</a></li>
                                <li><a href="#not2">Notification 2</a></li>
                                <li><a href="#not3">Notification 3</a></li>
                                <li><a href="#not4">Notification 4</a></li>
                                <li><a href="#another">Another notification</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#settings" class="btn-rotate">
                                <i class="ti-settings"></i>
                                <p class="hidden-md hidden-lg">
                                    Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@yield('modal')
</body>

@yield('js')

</html>
