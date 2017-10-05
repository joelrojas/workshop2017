@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
@endsection
@section('menu_kardex', 'open active')
@section('title', 'Asignacion de Tareas')
@section('title-description', 'Tabla de Tareas')
@section('content')
    <button id="orderModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir Tarea</button>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <table id="taskTable">
                        <thead>
                        <tr>
                            <td>Codigo</td>
                            <td>Empleado</td>
                            <td>Tarea</td>
                            <td>Fecha</td>
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
    <h4 class="modal-title">Añadir Tarea</h4>
@endsection
@section('modal-bod')
    <form role="form" method="post" id="createTask" action="{{ url('/task/store') }}">
        <fieldset class="form-group">
            <label class="control-label" for="empleado">Buscar Empleado</label>
            <input type="text" class="form-control" name="empleado" id="empleado">
            <input type="hidden" id="id-person" name="id-person"> </fieldset>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tarea</label>
            <select class="form-control" id="taskc" name="taskc">
                <option value="" disabled="" selected="">Tarea...</option>
                <option>Puerta</option>
                <option>Lavar</option>
                <option>Barrer</option>
                <option>Bar</option>
            </select>
            <input type="hidden" class="form-control" id="tasks_id"></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
            <input type="date" name="dateBegin" id="dateBeginc" class="form-control datepicker1" placeholder="Registrarse" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
            <input type="date" name="dateEnd" id="dateEndc" class="form-control datepicker2" placeholder="Registrarse" autocomplete="off" /></div>
    </form>
@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button class="btn btn-primary" type="button" id="crumbutton">
        Agregar
    </button>
@endsection
@section('js')
    <script src="js/vendor.js"></script>
    <script src="js/app-template.js"></script>
    <script src="js/task.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/main.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#taskTable").DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.tasks.index') }}",
                "columns": [
                    { data: 'id' },
                    { data: 'state' },
                    { data: 'dateBegin' },
                    { data: 'dateEnd' },
                ]
            });
        });

        $('#empleado').autocomplete({
            source: '{!! url('/buscarEmpleado') !!}',
            minlength:1,
            select:function (event, ui) {
                $('#id-person').val(ui.item.id);
            }
        });
    </script>
@endsection