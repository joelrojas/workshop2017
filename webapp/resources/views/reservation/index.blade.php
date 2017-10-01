<!--/**
* Created by PhpStorm.
 * User: joel
 * Date: 30-09-17
 * Time: 10:47 PM
 */-->
@extends('layouts.app')

@section('css')
{{-- Importando el css necesario para esta vista--}}
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">
    <style>
        .datepicker table tr td.disabled, .datepicker table tr td.disabled:hover {
            background: #CCCCCC;
            color: #444;
            cursor: default;
        }
    </style>
    <style>
        #overlay1 {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            right: 0;
            background: #ffffff;
            opacity: 0.7;
            filter: alpha(opacity=80);
            -moz-opacity: 0.6;
            z-index: 10000;
        }
        </style>
@endsection

@section('menu_reservation', 'open active')
@section('title', 'Reservaciones')
@section('title-description', 'Administración de las reservas')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> <b>Busqueda de Mesas</b> </h3>
                    </div>
                    <section class="example">
                        <form id="SearchTable">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-1 form-control-label">Cantidad de personas</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="quantityPeople" name="quantityPeople" placeholder="ingrese la cantidad de personas">
                                </div>
                                <label for="inputPassword3" class="col-sm-1 form-control-label">Fecha de reserva</label>
                                <div class="col-sm-4">
                                    <input type="text" id="checkDate" name="checkDate" class="form-control datepicker1" placeholder="ingrese la fecha de la reserva" autocomplete="off" />
                                </div>
                                <!--<div class="col-sm-3">
                                    <button type="submit" class="btn btn-success">Buscar mesa</button>
                                </div>-->
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <input class="btn btn-primary" type="submit" value="Completar reserva" style="display:none" id="next" />
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> <b>Listado de Reservas</b> </h3>
                    </div>
                    <section class="example">
                        <table class="table table-sm ">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Codigo Reserva</th>
                                <th>Nombre Completo</th>
                                <th>Fecha Reserva</th>
                                <th>Mesa Asignada</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Ver</td>
                            </tr>

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="js/vendor.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('.datepicker1').datepicker({
                todayHighlight: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                startDate: new Date(),
                // endDate : new Date('2014-08-08'),
            }).on('changeDate', function (selected) {
                var date1	= $(".datepicker1").datepicker('getDate')
                if(!date1){
                    Materialize.toast('<b>Error - La fecha de salida debe ser mayor que la fecha de entrada!!</b>', 4000, 'red');
                    $('.datepicker2').val('');
                    $('.datepicker2').focus();
                }else{
                    check_availbility();
                }
            });
            function check_availbility(){
                //call_loader();
                $.ajax({
                    url: '{{ url('/searchTable') }}',
                    type:'POST',
                    data:$('#SearchTable').serialize(),
                    success:function(result){
                        var obj = result.x;
                        var search = result.search;
                        if(obj==1)
                        {
                            $('#orderdata').html(search);
                            $('#next').show();
                            $.toaster({ priority : 'success', title : 'Éxito', message : 'Mesa disponible'});
                        }
                        else
                        {
                            $.toaster({ priority : 'danger', title : 'Fallo', message : 'Sin Mesas disponibles'});
                        }
                    }
                });
            }
        });
    </script>
@endsection