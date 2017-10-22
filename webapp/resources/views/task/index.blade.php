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
    <button action="{{ url('/taskCreate') }}"  type="button" class="btn btn-primary btn-lg" >Añadir Tarea</button>
    <section class="section">
        <div class="card">
            <div class="card-content">
                <div class="fresh-datatables">
                    <table id="taskTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
    <form method="get" action="/download-pdf">
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Inicio</label>
            <input type="date" name="startDate" id="startDate" class="form-control datepicker1" autocomplete="off" /></div>
        <div class="form-group">
            <label class="control-label" for="formGroupExampleInput">Fecha de Salida</label>
            <input type="date" name="endDate" id="endDate" class="form-control datepicker2" autocomplete="off" /></div>
        <button type="submit" class="btn btn-primary">Crear Pdf</button>
    </form>

    <!--
    <a href="{{url('/download-pdf')}}">PDF</a>
    -->
@endsection

<div id="myModalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>


            <div class="modal-body">
                <form role="form" id="socioOne">
                    {{ csrf_field() }}
                    <input type="hidden" name="idtask" id="idtask">
                    <div class="card-content">


                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Buscar Empleado <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="empleado"
                                       id="empleadoEdit"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                />
                                <input type="hidden" name="id-person" id="id-personEdit">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Fecha de Creacion de la Tarea <star>*</star>
                                </label>
                                <input class="form-control"
                                       type="date"
                                       name="date"
                                       id="dateEdit"
                                       required="true"
                                       autocomplete="off"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Tarea <star>*</star>
                                </label>
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="multiple" id="multipleEdit"  data-size="7">
                                    <option value="" disabled="" selected="">Tarea...</option>
                                    <option value="1">Puerta</option>
                                    <option value="2">Lavar</option>
                                    <option value="3">Barrer</option>
                                    <option value="4">Bar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Estado <star>*</star>
                                </label>
                                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="state" id="stateEdit"  data-size="7">
                                    <option value="" disabled="" selected="">Estado...</option>
                                    <option value="completo">Completo</option>
                                    <option value="incompleto">Incompleto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Fecha de Inicio <star>*</star>
                                </label>
                                <input class="form-control"
                                       type="date"
                                       name="dateBegin"
                                       id="dateBeginEdit"
                                       required="true"
                                       autocomplete="off"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label class="control-label">
                                    Fecha de Salida<star>*</star>
                                </label>
                                <input class="form-control"
                                       type="date"
                                       name="dateEnd"
                                       id="dateEndEdit"
                                       required="true"
                                       autocomplete="off"
                                />
                            </div>
                        </div>

                        <div class="category"><star>*</star> Campos Requeridos</div>
                    </div>

                </form>
            </div>



            <div class="modal-footer">
                <button id="EditTaskButton" type="submit" class="btn btn-info btn-fill pull-right" data-dismiss="modal">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="myModalDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Eliminar tarea</h4>
            </div>


            <div class="modal-body">
                <h2 id="task">¿Desea eliminar a este tarea?</h2>
            </div>



            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                <button id="DeleteTaskButton" type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>

    </div>
</div>

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