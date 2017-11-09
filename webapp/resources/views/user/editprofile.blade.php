@extends('layouts.app')
@section('css')
    <style>
        .card {
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('menu_task', 'open active')
@section('title', 'Control de Usuarios')
@section('title-description', 'Tabla de Usuarios')
@section('content')
    <h1>
        Editar Perfil
    </h1>

    <div class="col-md-6">
        <div class="card">
            <form role="form" id="profile">
                {{ csrf_field() }}
                <input type="hidden" name="idpeople" id="idpeople" value="{{ $user->id }}">
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-7">
                            <h4 class="card-title">
                                Usuario
                            </h4>
                            <label class="control-label">
                                Nombre de Usuario <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="username"
                                   type="text"
                                   required="true"
                                   value="{{ $user->username }}"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">
                                Correo Electronico <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="email"
                                   type="text"
                                   required="true"
                                   email="true"
                                   value="{{ $user->email }}"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">
                                Nombre(s) <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="name"
                                   id="name"
                                   type="text"
                                   required="true"
                                   value="{{ $people->name }}"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">
                                Apellido(s) <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="lastName"
                                   id="lastName"
                                   type="text"
                                   value="{{ $people->lastName }}"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">
                                Telefono/Celular
                            </label>
                            <input class="form-control"
                                   name="phone"
                                   id="phone"
                                   type="text"
                                   value="{{ $people->phone }}"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <label class="control-label">
                                Direccion
                            </label>
                            <input class="form-control"
                                   name="address"
                                   id="address"
                                   type="text"
                                   value="{{ $people->address }}"
                            />
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button id="editUserProfile" type="submit" class="btn btn-info btn-fill">Register</button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('js')
    <script src=" {{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/user.js"></script>
    <script type="text/javascript">

    $('#editUserProfile').click(function () {
    $.ajax({
    type: 'PUT',
    url: '/edituserprofile',
    data: $('#profile').serialize(),
    success:function () {
    }
    })
    });
    </script>
    <!--<script src="js/main.js"></script>-->
@endsection