@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<style>
    .ui-autocomplete {
        z-index:2147483647;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">

@endsection
@section('menu_task', 'open active')
@section('title', 'Asignacion de Tareas')
@section('title-description', 'Tabla de Tareas')
{{ csrf_field() }}
@section('content')
    <button id="orderModalButton" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#orderModal" >Añadir Tarea</button>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <!--
                <div class="input-daterange input-group" id="datepicker">
                    <input type="text" class="input-sm form-control" name="startDate" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}" />
                    <span class="input-group-addon">to</span>
                    <input type="text" class="input-sm form-control" name="endDate" value="{{ Carbon\Carbon::now()->format('m/d/Y') }}"/>
                </div>

                <button type="button" id="dateSearch" class="btn btn-sm btn-primary">Search</button>
                -->
                <div class="card">
                    <table id="taskTable">
                        <thead>
                        <tr>
                            <td>Codigo</td>
                            <td>Empleado</td>
                            <td>Tarea</td>
                            <td>Empleado</td>
                            <td>Tarea</td>
                            <td>Fecha</td>
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
    <a href="{{url('/download-pdf')}}">PDF</a>

@endsection
@section('modal-head')
    <h4 class="modal-title">Añadir Tarea</h4>
@endsection
@section('modal-bod')
    <form role="form">
        <label class="control-label" for="empleado">Buscar Empleado</label>
            <input type="text" class="form-control" name="empleado" id="empleado">
            <input type="hidden" id="id-person" name="id-person">
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Creacion de la Tarea</label>
            <input type="date" name="date" id="date" class="form-control datepicker1" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tarea</label>
            <select class="form-control" id="multiple" name="multiple">
                <option value="" disabled="" selected="">Tarea...</option>
                <option value="1">Puerta</option>
                <option value="2">Lavar</option>
                <option value="3">Barrer</option>
                <option value="4">Bar</option>
            </select></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
            <input type="date" name="dateBegin" id="dateBegin" class="form-control datepicker1" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
            <input type="date" name="dateEnd" id="dateEnd" class="form-control datepicker2" autocomplete="off" /></div>
    </form>
@endsection
@section('modal-foot')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="createTaskButton" type="submit" class="btn btn-primary" data-dismiss="modal">Agregar</button>
@endsection


@section('modal-head2')
    <h4 class="modal-title">Editar Tareas</h4>
@endsection

@section('modal-bod2')

    <form role="form" id="socioOne">
        {{ csrf_field() }}
        <input type="hidden" name="idtask" id="idtask">
        <label class="control-label" for="empleado">Buscar Empleado</label>
        <input type="text" class="form-control" name="empleado" id="empleadoEdit">
        <input type="hidden" id="id-personEdit" name="id-person">
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Creacion de la Tarea</label>
            <input type="date" name="date" id="dateEdit" class="form-control datepicker1" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tarea</label>
            <select class="form-control" id="stateEdit" name="state">
                <option value="" disabled="" selected="">Estado...</option>
                <option value="completo">Completo</option>
                <option value="incompleto">Incompleto</option>
            </select></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Seleccione Tarea</label>
            <select class="form-control" id="multipleEdit" name="multiple">
                <option value="" disabled="" selected="">Tarea...</option>
                <option value="1">Puerta</option>
                <option value="2">Lavar</option>
                <option value="3">Barrer</option>
                <option value="4">Bar</option>
            </select></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
            <input type="date" name="dateBegin" id="dateBeginEdit" class="form-control datepicker1" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
            <input type="date" name="dateEnd" id="dateEndEdit" class="form-control datepicker2" autocomplete="off" /></div>
    </form>
@endsection
@section('modal-foot2')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="EditTaskButton" type="button" class="btn btn-primary" data-dismiss="modal">Modificar</button>

@endsection


@section('modal-head3')
    <h4 class="modal-title">Eliminar tarea</h4>
@endsection

@section('modal-bod3')
    <h2 id="task">¿Desea eliminar a este tarea?</h2>
@endsection
@section('modal-foot3')
    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
    <button id="DeleteTaskButton" type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>

@endsection




@section('js')
    <script src=" {{ asset('js/vendor.js') }}"></script>
    <script src=" {{ asset('js/app-template.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/task.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#taskTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.tasks.index') }}",
                /*
                    data: function(d) {
                        d.startDate = $('input[name=startDate]').val();
                        d.endDate = $('input[name=endDate]').val();
                    },
                */
                "columns": [
                    { data: 'idtask' },
                    { data: 'task' },
                    { data: 'lastName' },
                    { data: 'state' },
                    { data: 'dateBegin' },
                    { data: 'dateEnd' },
                    { defaultContent: "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalEdit'>Editar</button>" + " "+ "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#SupplierModalDelete'>Eliminar</button>"}
                ]
            });
            /*
            $('.input-daterange').datepicker({
                autoclose: true,
                todayHighlight: true
            });

            $('#dateSearch').on('click', function() {
                table.draw();
            });
            */
            $('#taskTable tbody').on( 'click', 'button', function () {

                var data = table.row( $(this).parents('tr') ).data();
                $('#idtask').val(data['idtask']);
                $('#dateEdit').val(data['date']);
                $('#dateEndEdit').val(data['dateEnd']);
                $('#dateBeginEdit').val(data['dateBegin']);
                $('#stateEdit').val(data['state']);
                $('#multipleEdit').val(data['tasks_id']);
                $('#empleadoEdit').val(data['users_id']);
            } );
        });


        $('#empleado').autocomplete({
            source: '{!! url('/buscarEmpleado') !!}',
            minlength:1,
            select:function (event, ui) {
                $('#id-person').val(ui.item.id);
            }
        });
        $('#empleadoEdit').autocomplete({
            source: '{!! url('/buscarEmpleado') !!}',
            minlength:1,
            select:function (event, ui) {
                $('#id-personEdit').val(ui.item.id);
            }
        });

    </script>
@endsection