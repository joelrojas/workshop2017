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
    <div class="col-md-12">
        <div class="card">
            <form method="get" action="/download-pdf">
                {{ csrf_field() }}
                <div class="card-header">
                    <h4 class="card-title">
                        Reportes de Asignacion de Tareas
                    </h4>
                </div>
                <div class="card-content">

                        <div class="form-group">
                            <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
                            <input type="date" name="startDate" id="startDate" class="form-control datepicker1" autocomplete="off" /></div>
                        <div class="form-group">
                            <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
                            <input type="date" name="endDate" id="endDate" class="form-control datepicker2" autocomplete="off" /></div>


                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Descargar</button>
                </div>
            </form>
        </div>
    </div>

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
                "columns": [
                    { data: 'idtask' },
                    { data: 'task' },
                    { data: 'lastName' },
                    { data: 'state' },
                    { data: 'dateBegin' },
                    { data: 'dateEnd' },
                    { defaultContent: "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModalEdit'>Editar</button>" + " "+ "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModalDelete'>Eliminar</button>"}
                ]
            });


            $('#DeleteTaskButton').click( function () {
                table.ajax.reload();
            } );

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

            $('#EditTaskButton').click( function () {
                table.ajax.reload();
            } );
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