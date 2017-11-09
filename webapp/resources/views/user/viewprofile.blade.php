@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >
@endsection

@section('view_profile', 'open active')
@section('title', 'Ver Perfil')
@section('title-description', 'Ver Perfil')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div id="sidebar">
                                    <div class="user">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/img/no-foto.jpg') }}" width="300px" height="300px" class="img-circle">
                                        </div>
                                        <div class="user-head">
                                            <h1> {{ $people->name }}<br>{{ $people->lastName }}</h1>
                                            <div class="hr-center"></div>
                                            <h5>{{ $user->userType }}</h5>
                                        </div>
                                    </div>
                                    <div class="sosmed">
                                        <div class="text-center">
                                            <a href="http://bootemplates.com/themes/marinka/#"><i class="fa fa-facebook fa-2x" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>
                                            <a href="http://bootemplates.com/themes/marinka/#"><i class="fa fa-twitter fa-2x" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>
                                            <a href="http://bootemplates.com/themes/marinka/#"><i class="fa fa-google-plus fa-2x" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus"></i></a>
                                        </div>
                                        <div class="hr-center"></div>
                                    </div>
                                </div>
                            </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div id="content">

                                    <!-- start:main content -->
                                    <div class="main-content">
                                        <ul class="timeline">
                                            <!-- start:profile -->
                                            <li id="id-profile">
                                                <div class="timeline-badge default"><i class="fa fa-user" data-original-title="" title=""></i></div>
                                                <h1 class="timeline-head">PERFIL DE USUARIO</h1>
                                            </li>
                                            <li id="profile">
                                                <div class="timeline-badge primary"></div>
                                                <div class="timeline-panel">
                                                    <h1>Hola, me llamo <strong>{{ $people->name }} {{ $people->lastName }}</strong></h1>
                                                    <h4>{{ $user->userType }}</h4>
                                                    <div class="hr-left"></div>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                </div>
                                            </li>
                                            <li id="personal-info">
                                                <div class="timeline-badge primary"></div>
                                                <div class="timeline-panel">
                                                    <h1>Informacion Personal</h1>
                                                    <div class="hr-left"></div>

                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Nombre</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $people->name }}</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Apellido</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $people->lastName }}</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Correo</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $user->email }}</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Direccion</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $people->address }}</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Telefono</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $people->phone }}</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" disabled="" class="btn btn-primary">Nacimiento</button>
                                                        <button type="button" disabled="" class="btn btn-default">{{ $people->birthday }}</button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <!--  Select Picker Plugin -->
    <script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-table.js') }}"></script>
    <!--  Plugin for DataTables.net  -->
    <script src="{{ asset('assets/js/jquery.datatables.js') }}"></script>
    <!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <!--  Forms Validations Plugin -->
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.toaster.js') }}" type="text/javascript"></script>




@endsection