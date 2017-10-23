@extends('layouts.app')
@section('menu_task', 'open active')
@section('title', 'Control de Usuarios')
@section('title-description', 'Tabla de Usuarios')
{{ csrf_field() }}
@section('content')
    <div class="col-md-12">
        <div class="card">
            <form role="form">
                {{ csrf_field() }}
                <div class="card-header">
                    <h4 class="card-title">
                        Registro de Usuarios
                    </h4>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-5">
                            <h4 class="card-title">
                                Datos Personales
                            </h4>
                            <label class="control-label">
                                Carnet de Identidad <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="ci"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-5">
                            <h4 class="card-title">
                                Usuario
                            </h4>
                            <label class="control-label">
                                Nombre de Usuario
                            </label>
                            <input class="form-control"
                                   name="username"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Nombre(s) <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="name"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-5">
                            <label class="control-label">
                                Correo Electronico
                            </label>
                            <input class="form-control"
                                   name="email"
                                   type="text"
                                   required="true"
                                   email="true"
                                   autocomplete="off"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Apellido(s) <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="lastName"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-5">
                            <label class="control-label">
                                Contraseña <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="password"
                                   type="password"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Birthday <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="birthday"
                                   type="date"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-5">
                            <label class="control-label">
                                Tipo de Usuario
                            </label>
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="userType" data-size="7">
                                <option value="" disabled="" selected="">Tipo de Usuario...</option>
                                <option value="administrador">Administrador</option>
                                <option value="recepcionista">Recepcionista</option>
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Telefono/Celular <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="phone"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Sexo <star>*</star>
                            </label>
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="sex" data-size="7">
                                <option value="" disabled="" selected="">Sexo...</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Direccion <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="address"
                                   type="text"
                                   autocomplete="off"
                            />
                        </div>
                    </div>


                    <div class="category"><star>*</star> Campos Requeridos</div>
                </div>

                <div class="card-footer">
                    <button id="createUserButton" type="submit" class="btn btn-info btn-fill pull-right">Register</button>
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
    <!--<script src="js/main.js"></script>-->
@endsection