<!-- /**
 * Created by PhpStorm.
 * User: joel
 * Date: 04-10-17
 * Time: 12:32 PM
 */ -->
@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}" />
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
        .ui-autocomplete {
            z-index:2147483647;
        }
    </style>
@endsection

@section('menu_reservation', 'open active')
@section('title', 'Crear Reserva')
@section('title-description', 'Registro de reservas')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title">INFORMACIÓN DEl CLIENTE</p>
                        </div>
                    </div>
                        <form id="dataPeople" method="post" action="/reservation/store">
                            {{csrf_field()}}
                            <div class="card-block">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Apellido completo </label>
                                        <input type="text" class="form-control" id="last-name" name="last-name" placeholder="ingrese el apellido completo">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Nombre completo</label>
                                        <input type="text" class="form-control" id="first-name" name="first-name" placeholder="ingrese el nombre completo">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Carnet de identidad</label>
                                        <input type="text" class="form-control" id="ci" name="ci" placeholder="ingrese el carnet de identidad">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="" class="control-label">Telefono</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="ingrese el numero de celular">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" class="control-label">Fecha de nacimiento</label>
                                        <input type="text"  class="form-control datepicker1" id="birthday" name="birthday" placeholder="ingrese la fecha de nacimiento" autocomplete="off" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" class="control-label">Dirección</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="ingrese la dirección">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <!--<label for="inputPassword3" class="col-sm-2 form-control-label">Sexo</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="sex" name="sex" class="form-control datepicker1" placeholder="ingrese la fecha de la reserva" autocomplete="off" />
                                    </div>-->
                                    <input type="hidden" value="" id="id-customer" name="id-customer">
                                    <input type="hidden" value="" id="helper" name="helper">
                                    <input type="hidden" value="{{ date('d-m-Y') }}" id="day-reservation" name="day-reservation">
                                </div>
                            </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="header-block">
                                    <p class="title">INFORMACIÓN DE LA RESERVA</p>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="" class="form-control-label">Tipo de mesa</label>
                                        <!-- <input type="text" class="form-control" id="quantityPeople" name="quantityPeople" placeholder="Seleccione el tipo de mesa"> -->
                                        <select class="form-control" name="id-table" id="id-table">
                                            <option selected disabled>Seleccione un tipo de mesa</option>

                                            @foreach($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->typeTable }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" class="form-control-label">Fecha de reserva</label>
                                        <input type="text" id="checkDate" name="checkDate" class="form-control datepicker2" placeholder="ingrese la fecha de la reserva" autocomplete="off" />

                                        <!-- <input type="hidden" value="" id="id-table" name="id-table"> -->
                                        <!-- <input type="hidden" value="" id="quantityChairs-table" name="quantityChairs-table"> -->
                                        <input type="hidden" value="" id="dateReservation-table" name="dateReservation-table">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Completar"/>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title">HISTORIAL CLIENTE</p>
                        </div>
                    </div>
                    <div class="card-block" id="customer-history">
                        <p id="client-type"><b>Tipo de cliente: </b></p>
                        <p id="points"><b>Puntos: </b></p>
                        <p id="lastDate"><b>Ultima visita: </b></p>
                    </div>
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title">RESERVAS PASADAS</p>
                        </div>
                    </div>
                    <div class="card-block" id="customer-history">
                        <p id="client-type"><b>Tipo de cliente: </b></p>
                        <p id="points"><b>Puntos: </b></p>
                        <p id="lastDate"><b>Ultima visita: </b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src=" {{ asset('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
    <script type="text/javascript">

        $('.datepicker1').datepicker( {
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yyyy',
        });
        $('.datepicker2').datepicker( {
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            startDate: new Date(),
        });
        $('#first-name').autocomplete({
            source: '{{ route('search.customer.name') }}',
            minlength:1,
            select:function (event, ui) {
                $('#id-customer').val(ui.item.id);
                $('#birthday').val(ui.item.birthday);
                $('#phone').val(ui.item.phone);
                $('#last-name').val(ui.item.lastname);
                $('#ci').val(ui.item.ci);
                $('#address').val(ui.item.address);
                $('#helper').val(1);
                customerHistory();
            }
        });
        $('#phone').autocomplete({
            source: '{{ route('search.customer.phone') }}',
            minlength:1,
            select:function (event, ui) {
                $('#id-customer').val(ui.item.id);
                $('#birthday').val(ui.item.birthday);
                $('#first-name').val(ui.item.name);
                $('#last-name').val(ui.item.lastname);
                $('#ci').val(ui.item.ci);
                $('#address').val(ui.item.address);
                $('#helper').val(1);
                customerHistory();
            }
        });
        $('#ci').autocomplete({
            source: '{{ route('search.customer.ci') }}',
            minlength:1,
            select:function (event, ui) {
                $('#id-customer').val(ui.item.id);
                $('#birthday').val(ui.item.birthday);
                $('#first-name').val(ui.item.name);
                $('#last-name').val(ui.item.lastname);
                $('#phone').val(ui.item.phone);
                $('#address').val(ui.item.address);
                $('#helper').val(1);
                customerHistory();
            }
        });
        function customerHistory() {

            $.ajax({
                url: '{{ url('/customerHistory') }}',
                type: 'POST',
                data: $('#dataPeople').serialize(),
                success: function (result) {
                    var obj = result.x;
                    var data = result.search;
                    if (obj == 1)
                    {
                        $.toaster({ priority : 'success', title : 'Éxito', message : 'Usuario encontrado'});
                        document.getElementById("client-type").innerHTML = "<b>Tipo de cliente :</b>  "+data.clientType;
                        document.getElementById("points").innerHTML = "<b>Puntos :</b> "+data.points;
                        //document.getElementById('customer-history').innerHTML= data.clientType;
                    }
                    else{
                        $.toaster({ priority : 'danger', title : 'Fallo', message : 'Usuario Nuevo'});
                    }
                }
            });
        }
    </script>
@endsection