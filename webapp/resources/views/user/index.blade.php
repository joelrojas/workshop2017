@extends('layouts.app')
@section('menu_task', 'open active')
@section('title', 'Control de Usuarios')
@section('title-description', 'Tabla de Usuarios')
{{ csrf_field() }}
@section('content')

    <section class="section">
        <div class="card">
            <div class="card-content">
                <div class="fresh-datatables">
                    <table id="userTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <td>CI</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Correo Electronico</td>
                            <td>Usuario</td>
                            <td>Tipo de Usuario</td>
                            <td>Opciones</td>

                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>


            <div class="modal-body">
                <form role="form" id="socio">
                    {{ csrf_field() }}
                    <input type="hidden" name="idpeople" id="idpeople">
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
                                       id="ciEdit"
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
                                       id="usernameEdit"
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
                                       id="nameEdit"
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
                                       id="emailEdit"
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
                                       id="lastNameEdit"
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
                                       id="passwordEdit"
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
                                       id="birthdayEdit"
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
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="userType" id="userTypeEdit" data-size="7">
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
                                       id="phoneEdit"
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
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="sex" id="sexEdit" data-size="7">
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
                                       id="addressEdit"
                                       type="text"
                                       autocomplete="off"
                                />
                            </div>
                        </div>


                        <div class="category"><star>*</star> Campos Requeridos</div>
                    </div>

                </form>
            </div>



            <div class="modal-footer">
                <button id="EditUserButton" type="submit" class="btn btn-info btn-fill pull-right">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@section('js')
    <script src=" {{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/user.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#userTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.users.index') }}",
                "columns": [
                    { data: 'ci' },
                    { data: 'name' },
                    { data: 'lastName' },
                    { data: 'email' },
                    { data: 'username' },
                    { data: 'userType' },
                    { defaultContent: "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Editar</button>" + " "+ "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalDelete'>Eliminar</button>"}
                ],

            });

            $('#userTable tbody').on( 'click', 'button', function () {

                var data = table.row( $(this).parents('tr') ).data();
                $('#idpeople').val(data['idpeople']);
                $('#ciEdit').val(data['ci']);
                $('#nameEdit').val(data['name']);
                $('#lastNameEdit').val(data['lastName']);
                $('#birthdayEdit').val(data['birthday']);
                $('#phoneEdit').val(data['phone']);
                $('#sexEdit').val(data['sex']);
                $('#addressEdit').val(data['address']);
                $('#userTypeEdit').val(data['userType']);
                $('#emailEdit').val(data['email']);
                $('#usernameEdit').val(data['username']);
                $('#passwordEdit').val(data['password']);
            } );
        });


    </script>
@endsection