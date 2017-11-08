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


                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
                                <input type="text" name="startDate" id="startDate" class="form-control datepicker1" autocomplete="off" /></div>
                        </div>
                        <div class="col-md-1">
                            <label class="control-label">
                            </label>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
                                <input type="text" name="endDate" id="endDate" class="form-control datepicker2" autocomplete="off" /></div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Descargar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-selectpicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="js/task.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker1').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
            $('.datepicker2').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
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