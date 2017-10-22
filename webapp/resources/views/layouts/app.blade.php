<!doctype html>
<html lang="en">

<!-- Mirrored from demos.creative-tim.com/paper-dashboard-pro/examples/dashboard/stats.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Oct 2017 00:18:10 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Dashboard PRO by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

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
</head>

<body >
<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <div class="logo">
            <a href="http://www.creative-tim.com/" class="simple-text logo-mini">
                CT
            </a>

            <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
                Creative Tim
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
								Chet Faker
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
                <!-- <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Capacity</p>
                                            105GB
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Revenue</p>
                                            $1,345
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-calendar"></i> Last day
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Errors</p>
                                            23
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-timer"></i> In the last hour
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-twitter-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Followers</p>
                                            +45
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="numbers pull-left">
                                            $34,657
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="pull-right">
												<span class="label label-success">
		 											+18%
												</span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="big-title">total earnings <span class="text-muted">in last</span> ten <span class="text-muted">quarters</span></h6>
                                <div id="chartTotalEarnings"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="210px" class="ct-chart-line" style="width: 100%; height: 210px;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M50,129C58.236,125.333,82.944,112.667,99.417,107C115.889,101.333,132.361,93.667,148.833,95C165.306,96.333,181.778,120.667,198.25,115C214.722,109.333,231.194,67.667,247.667,61C264.139,54.333,280.611,82.667,297.083,75C313.556,67.333,338.264,25,346.5,15" class="ct-line ct-green"></path></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="180" width="49.416666666666664" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="99.41666666666666" y="180" width="49.416666666666664" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="148.83333333333331" y="180" width="49.41666666666667" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">Mar</span></foreignObject><foreignObject style="overflow: visible;" x="198.25" y="180" width="49.41666666666666" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">April</span></foreignObject><foreignObject style="overflow: visible;" x="247.66666666666666" y="180" width="49.41666666666666" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">May</span></foreignObject><foreignObject style="overflow: visible;" x="297.0833333333333" y="180" width="49.416666666666686" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">June</span></foreignObject><foreignObject style="overflow: visible;" y="155" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">0</span></foreignObject><foreignObject style="overflow: visible;" y="135" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">100</span></foreignObject><foreignObject style="overflow: visible;" y="115" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">200</span></foreignObject><foreignObject style="overflow: visible;" y="95" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">300</span></foreignObject><foreignObject style="overflow: visible;" y="75" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">400</span></foreignObject><foreignObject style="overflow: visible;" y="55" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">500</span></foreignObject><foreignObject style="overflow: visible;" y="35" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">600</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">700</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">800</span></foreignObject></g></svg></div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="footer-title">Financial Statistics</div>
                                <div class="pull-right">
                                    <button class="btn btn-info btn-fill btn-icon btn-sm">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="numbers pull-left">
                                            169
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="pull-right">
												<span class="label label-danger">
		 											-14%
												</span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="big-title">total subscriptions <span class="text-muted">in last</span> 7 days</h6>
                                <div id="chartTotalSubscriptions"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="210px" class="ct-chart-line" style="width: 100%; height: 210px;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M50,79C57.06,81.667,78.238,87,92.357,95C106.476,103,120.595,127,134.714,127C148.833,127,162.952,105.667,177.071,95C191.19,84.333,205.31,65.667,219.429,63C233.548,60.333,247.667,84.333,261.786,79C275.905,73.667,290.024,41.667,304.143,31C318.262,20.333,339.44,17.667,346.5,15" class="ct-line ct-red"></path></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="180" width="42.357142857142854" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">M</span></foreignObject><foreignObject style="overflow: visible;" x="92.35714285714286" y="180" width="42.357142857142854" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">T</span></foreignObject><foreignObject style="overflow: visible;" x="134.71428571428572" y="180" width="42.35714285714285" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">W</span></foreignObject><foreignObject style="overflow: visible;" x="177.07142857142856" y="180" width="42.35714285714286" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">T</span></foreignObject><foreignObject style="overflow: visible;" x="219.42857142857142" y="180" width="42.35714285714286" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">F</span></foreignObject><foreignObject style="overflow: visible;" x="261.7857142857143" y="180" width="42.35714285714283" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">S</span></foreignObject><foreignObject style="overflow: visible;" x="304.1428571428571" y="180" width="42.35714285714289" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 42px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">S</span></foreignObject><foreignObject style="overflow: visible;" y="155" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">0</span></foreignObject><foreignObject style="overflow: visible;" y="135" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">12.5</span></foreignObject><foreignObject style="overflow: visible;" y="115" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">25</span></foreignObject><foreignObject style="overflow: visible;" y="95" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">37.5</span></foreignObject><foreignObject style="overflow: visible;" y="75" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">50</span></foreignObject><foreignObject style="overflow: visible;" y="55" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">62.5</span></foreignObject><foreignObject style="overflow: visible;" y="35" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">75</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="20" width="30"><span class="ct-label ct-vertical ct-start" style="height: 20px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">87.5</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">100</span></foreignObject></g></svg></div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="footer-title">View all members</div>
                                <div class="pull-right">
                                    <button class="btn btn-default btn-fill btn-icon btn-sm">
                                        <i class="ti-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="numbers pull-left">
                                            8,960
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="pull-right">
												<span class="label label-warning">
		 											~51%
												</span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="big-title">total downloads <span class="text-muted">in last</span> 6 years</h6>
                                <div id="chartTotalDownloads"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="210px" class="ct-chart-line" style="width: 100%; height: 210px;"><g class="ct-grids"></g><g><g class="ct-series ct-series-a"><path d="M50,153.667C58.236,154.259,82.944,164.007,99.417,157.222C115.889,150.437,132.361,134.719,148.833,112.956C165.306,91.193,181.778,25.951,198.25,26.644C214.722,27.338,231.194,99.993,247.667,117.116C264.139,134.239,288.847,127.338,297.083,129.382" class="ct-line ct-orange"></path></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="180" width="49.416666666666664" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2009</span></foreignObject><foreignObject style="overflow: visible;" x="99.41666666666666" y="180" width="49.416666666666664" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2010</span></foreignObject><foreignObject style="overflow: visible;" x="148.83333333333331" y="180" width="49.41666666666667" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2011</span></foreignObject><foreignObject style="overflow: visible;" x="198.25" y="180" width="49.41666666666666" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2012</span></foreignObject><foreignObject style="overflow: visible;" x="247.66666666666666" y="180" width="49.41666666666666" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2013</span></foreignObject><foreignObject style="overflow: visible;" x="297.0833333333333" y="180" width="49.416666666666686" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 49px; height: 20px" xmlns="http://www.w3.org/2000/xmlns/">2014</span></foreignObject><foreignObject style="overflow: visible;" y="139.44444444444446" x="10" height="35.55555555555556" width="30"><span class="ct-label ct-vertical ct-start" style="height: 36px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">0</span></foreignObject><foreignObject style="overflow: visible;" y="103.8888888888889" x="10" height="35.55555555555556" width="30"><span class="ct-label ct-vertical ct-start" style="height: 36px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">2000</span></foreignObject><foreignObject style="overflow: visible;" y="68.33333333333333" x="10" height="35.55555555555556" width="30"><span class="ct-label ct-vertical ct-start" style="height: 36px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">4000</span></foreignObject><foreignObject style="overflow: visible;" y="32.77777777777777" x="10" height="35.55555555555556" width="30"><span class="ct-label ct-vertical ct-start" style="height: 36px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">6000</span></foreignObject><foreignObject style="overflow: visible;" y="2.7777777777777715" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/2000/xmlns/">8000</span></foreignObject></g></svg></div>
                            </div>
                            <div class="card-footer">
                                <hr>
                                <div class="footer-title">View more details</div>
                                <div class="pull-right">
                                    <button class="btn btn-success btn-fill btn-icon btn-sm">
                                        <i class="ti-info"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-circle-chart" data-background-color="blue">
                            <div class="card-header text-center">
                                <h5 class="card-title">Dashboard</h5>
                                <p class="description">Monthly sales target</p>
                            </div>
                            <div class="card-content">
                                <div id="chartDashboard" class="chart-circle" data-percent="70">70%<canvas height="160" width="160"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-circle-chart" data-background-color="green">
                            <div class="card-header text-center">
                                <h5 class="card-title">Orders</h5>
                                <p class="description">Completed</p>
                            </div>
                            <div class="card-content">
                                <div id="chartOrders" class="chart-circle" data-percent="34">34%<canvas height="160" width="160"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-circle-chart" data-background-color="orange">
                            <div class="card-header text-center">
                                <h5 class="card-title">New Visitors</h5>
                                <p class="description">Out of total number</p>
                            </div>
                            <div class="card-content">
                                <div id="chartNewVisitors" class="chart-circle" data-percent="62">62%<canvas height="160" width="160"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card card-circle-chart" data-background-color="brown">
                            <div class="card-header text-center">
                                <h5 class="card-title">Subscriptions</h5>
                                <p class="description">Monthly newsletter</p>
                            </div>
                            <div class="card-content">
                                <div id="chartSubscriptions" class="chart-circle" data-percent="10">10%<canvas height="160" width="160"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="fixed-plugin">
    <div class="dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title">Sidebar Background</li>
            <li class="adjustments-line text-center">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <span class="badge filter badge-brown active" data-color="brown"></span>
                    <span class="badge filter badge-white" data-color="white"></span>
                </a>
            </li>

            <li class="header-title">Sidebar Active Color</li>
            <li class="adjustments-line text-center">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <span class="badge filter badge-primary" data-color="primary"></span>
                    <span class="badge filter badge-info" data-color="info"></span>
                    <span class="badge filter badge-success" data-color="success"></span>
                    <span class="badge filter badge-warning" data-color="warning"></span>
                    <span class="badge filter badge-danger active" data-color="danger"></span>
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/paper-dashboard?ref=pdp-free-demo" target="_blank" class="btn btn-info btn-block">Get Free Demo</a>
                    <a href="http://www.creative-tim.com/product/paper-dashboard-pro" target="_blank" class="btn btn-danger btn-block btn-fill">Buy for $39</a>
                </div>
            </li>

            <li class="header-title">Thank you for sharing!</li>

            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-twitter btn-round"><i class="fa fa-twitter"></i> </button>
                <button id="facebook" class="btn btn-social btn-facebook btn-round"><i class="fa fa-facebook-square"></i></button>
            </li>

        </ul>
    </div>
</div>

</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->

<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('') }}assets/js/perfect-scrollbar.min.js" type="text/javascript"></script> -->
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Forms Validations Plugin -->
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ asset('assets/js/es6-promise-auto.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('assets/js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>

<!--  Switch and Tags Input Plugins -->
<script src="{{ asset('assets/js/bootstrap-switch-tags.js') }}"></script>

<!-- Circle Percentage-chart -->
<script src="{{ asset('assets/js/jquery.easypiechart.min.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{ asset('assets/js/jquery-jvectormap.js') }}"></script>

<!-- Wizard Plugin    -->
<script src="{{ asset('assets/js/jquery.bootstrap.wizard.min.js') }}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('assets/js/jquery.datatables.js') }}"></script>

<!--  Full Calendar Plugin    -->
<script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

<!--   Sharrre Library    -->
<script src="{{ asset('assets/js/jquery.sharrre.js') }}"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/js/demo.js') }}"></script>
@yield('js')

</html>
