@extends('layouts.app')
@section('menu_task', 'open active')
@section('title', 'Control de Usuarios')
@section('title-description', 'Tabla de Usuarios')
{{ csrf_field() }}
@section('content')
    <button id="orderModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir Tarea</button>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="userTable">
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

@section('modal-head')
    <h4 class="modal-title">Añadir Usuario</h4>
@endsection
@section('modal-bod')
    <form role="form">

        <div class="form-group">
            <label class="control-label" for="ci">Carnet de Identidad</label>
            <input type="text" class="form-control" name="ci" ></div>
        <div class="form-group">
            <label class="control-label" for="nombre">Nombre</label>
            <input type="text" class="form-control" name="name" ></div>
        <div class="form-group">
            <label class="control-label" for="apellido">Apellido</label>
            <input type="text" class="form-control" name="lastName" ></div>
        <div class="form-group">
            <label class="control-label" for="nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="birthday" ></div>
        <div class="form-group">
            <label class="control-label" for="telefono">Telefono/Celular</label>
            <input type="text" class="form-control" name="phone" ></div>
        <div class="form-group">
            <label class="control-label" for="sexo">Sexo</label>
            <select class="form-control"  name="sex">
                <option value="" disabled="" selected="">Sexo...</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select></div>
        <div class="form-group">
            <label class="control-label" for="direccion">Direccion</label>
            <input type="text" class="form-control" name="address"></div>
        <div class="form-group">
            <label class="control-label" for="email">Correo Electronico</label>
            <input type="text" class="form-control" name="email" ></div>
        <div class="form-group">
            <label class="control-label" for="username">Usuario</label>
            <input type="text" class="form-control" name="username" ></div>
        <div class="form-group">
            <label class="control-label" for="password">Contraseña</label>
            <input type="text" class="form-control" name="password"></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tipo de Usuario</label>
            <select class="form-control" name="userType">
                <option value="" disabled="" selected="">Tipo de Usuario...</option>
                <option value="Administrador">Administrador</option>
                <option value="Recepcionista">Recepcionista</option>
            </select></div>
    </form>
@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="createUserButton" type="submit" class="btn btn-primary" data-dismiss="modal">Agregar</button>
@endsection


@section('modal-head2')
    <h4 class="modal-title">Editar Usuario</h4>
@endsection

@section('modal-bod2')

    <form role="form" id="socio">
        {{ csrf_field() }}
        <input type="hidden" name="idpeople" id="idpeople">
        <div class="form-group">
            <label class="control-label" for="ci">Carnet de Identidad</label>
            <input type="text" class="form-control" name="ci" id="ciEdit"></div>
        <div class="form-group">
            <label class="control-label" for="nombre">Nombre</label>
            <input type="text" class="form-control" name="name" id="nameEdit"></div>
        <div class="form-group">
            <label class="control-label" for="apellido">Apellido</label>
            <input type="text" class="form-control" name="lastName" id="lastNameEdit"></div>
        <div class="form-group">
            <label class="control-label" for="nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="birthday" id="birthdayEdit"></div>
        <div class="form-group">
            <label class="control-label" for="telefono">Telefono/Celular</label>
            <input type="text" class="form-control" name="phone" id="phoneEdit"></div>
        <div class="form-group">
            <label class="control-label" for="sexo">Sexo</label>
            <select class="form-control" name="sex" id="sexEdit">
                <option value="" disabled="" selected="">Sexo...</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select></div>
        <div class="form-group">
            <label class="control-label" for="direccion">Direccion</label>
            <input type="text" class="form-control" name="address" id="addressEdit"></div>
        <div class="form-group">
            <label class="control-label" for="email">Correo Electronico</label>
            <input type="text" class="form-control" name="email" id="emailEdit"></div>
        <div class="form-group">
            <label class="control-label" for="username">Usuario</label>
            <input type="text" class="form-control" name="username" id="usernameEdit"></div>
        <div class="form-group">
            <label class="control-label" for="password">Contraseña</label>
            <input type="text" class="form-control" name="password" id="passwordEdit"></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tipo de Usuario</label>
            <select class="form-control" name="userType" id="userTypeEdit" >
                <option value="" disabled="" selected="">Tipo de Usuario...</option>
                <option value="Administrador">Administrador</option>
                <option value="Recepcionista">Recepcionista</option>
            </select></div>
    </form>
@endsection
@section('modal-foot2')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="EditUserButton" type="submit" class="btn btn-primary" data-dismiss="modal">Modificar</button>

@endsection

@section('js')
    <script src=" {{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
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
                    { defaultContent: "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalEdit'>Editar</button>" + " "+ "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalDelete'>Eliminar</button>"},
                ]
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