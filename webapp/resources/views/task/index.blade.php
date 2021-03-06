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

    <section class="section">
        <h1>Lista de Asignacion de Tareas</h1>
        <div class="card">
            <div class="card-content">
                <div class="fresh-datatables">
                    <table id="taskTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <td>Codigo</td>
                            <td>Tarea</td>
                            <td>Empleado</td>
                            <td>Estado</td>
                            <td>Inicio</td>
                            <td>Fin</td>
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
@section('modal')
<div id="myModalEdit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Tarea</h4>
            </div>


            <div class="modal-body">
                <form role="form" id="socioOne">
                    {{ csrf_field() }}
                    <input type="hidden" name="idtask" id="idtask">
                    <div class="card-content">


                        <div class="row">
                            <div class="col-md-8">
                                <label class="control-label">
                                    Buscar Empleado <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="empleado"
                                       id="empleadoEdit"
                                       type="text"
                                       required
                                       autocomplete="off"
                                />
                                <input type="hidden" name="id-person" id="id-personEdit">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
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
                            <div class="col-md-8 selectContainer">
                                <label class="control-label">
                                    Tarea <star>*</star>
                                </label>
                                <select class="form-control" name="multiple" id="multipleEdit" >
                                    <option value="" disabled="" selected="">Tarea...</option>
                                    <option value="1">Puerta</option>
                                    <option value="2">Lavar</option>
                                    <option value="3">Barrer</option>
                                    <option value="4">Bar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 selectContainer">
                                <label class="control-label">
                                    Estado <star>*</star>
                                </label>
                                <select class="form-control" name="state" id="stateEdit" >
                                    <option value="" disabled="" selected="">Estado...</option>
                                    <option value="completo">Completo</option>
                                    <option value="incompleto">Incompleto</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
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
                            <div class="col-md-8">
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
                <button id="EditTaskButton" type="submit" class="btn btn-info btn-fill pull-right" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>

    </div>
</div>
@endsection

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
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/task.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">
        $(document).ready(function() {

            $("#myModalEdit form").validate({
                rules: {
                    // simple rule, converted to {required:true}
                    empleado: {
                        required: true
                    }
                    // compound rule
                },
                messages: {
                    empleado: {
                        required: "Busque a un empleado"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                    $('#myModalEdit').modal('hide');
                }
            });

            var table = $('#taskTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.tasks.index') }}",
                "columns": [
                    { data: 'tasks_id' },
                    { data: 'task' },
                    { data: 'lastName' },
                    { data: 'state' },
                    { data: 'dateBegin' },
                    { data: 'dateEnd' },
                    { defaultContent: "<button class='btn btn-default btn-group-xs btn-fill' data-toggle='modal' data-target='#myModalEdit'><i class='ti ti-marker'></i>Editar</button>" + " "+ "<button class='btn btn-danger btn-group-xs btn-fill' data-toggle='modal' data-target='#myModalDelete'><i class='ti ti-trash'></i>Eliminar</button>"}
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