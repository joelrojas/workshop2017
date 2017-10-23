@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <style>
        .ui-autocomplete {
            z-index: 1001;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">
@endsection
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
                        Registro de Tareas
                    </h4>
                </div>
                <div class="card-content">


                    <div class="row">
                        <div class="col-md-5">
                            <label class="control-label">
                                Buscar Empleado <star>*</star>
                            </label>
                            <input class="form-control"
                                   name="empleado"
                                   id="empleado"
                                   type="text"
                                   required="true"
                                   autocomplete="off"
                            />
                            <input type="hidden" name="id-person" id="id-person">
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
                                   id="date"
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
                            <select class="selectpicker" data-style="btn btn-danger btn-block" title="Single Select" name="multiple" id="multiple"  data-size="7">
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
                                Fecha de Inicio <star>*</star>
                            </label>
                            <input class="form-control"
                                   type="date"
                                   name="dateBegin"
                                   id="dateBegin"
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
                                   id="dateEnd"
                                   required="true"
                                   autocomplete="off"
                            />
                        </div>
                    </div>

                    <div class="category"><star>*</star> Campos Requeridos</div>
                </div>

                <div class="card-footer">
                    <button id="createTaskButton" type="submit" class="btn btn-info btn-fill pull-right">Register</button>
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
    <script src="js/task.js"></script>
    <!--<script src="js/main.js"></script>-->
    <script type="text/javascript">

        $('#empleado').autocomplete({
            source: '{!! url('/buscarEmpleado') !!}',
            minlength:1,
            select:function (event, ui) {
                $('#id-person').val(ui.item.id);
            }
        });
    </script>
@endsection