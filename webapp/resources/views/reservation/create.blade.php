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
@section('title', 'Crear Reserva')
@section('title-description', 'Registro de reserva')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card card-success">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title">INFORMACIÓN DE LA RESERVA</p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p><b>Cantidad de personas: </b>{{ $quantityPeople }}</p>
                        <p><b>Dia de reserva: </b>{{date('d-m-Y')}}</p>
                        <p><b>Fecha para reservar: </b>{{ $dateView }}</p>

                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> <b>INGRESE LOS DATOS DE LA RESERVA</b> </h3>
                    </div>
                    <section class="example">
                        <form id="dataPeople" method="post" action="/reservation/create"><br>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="inputEmail4" class="col-sm-2 form-control-label">Celular</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="ingrese el numero de celular">
                                </div>
                                <label for="inputPassword4" class="col-sm-2 form-control-label">Fecha nacimiento</label>
                                <div class="col-sm-4">
                                    <input type="text"  class="form-control datepicker1" id="birthday" name="birthday" placeholder="ingrese la fecha de nacimiento" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">Nombres</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="ingrese la cantidad de personas">
                                </div>
                                <label for="inputPassword3" class="col-sm-2 form-control-label">Apellido completo</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="ingrese la fecha de la reserva" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 form-control-label">Direccion</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="ingrese la cantidad de personas">
                                </div>
                                <!--<label for="inputPassword3" class="col-sm-2 form-control-label">Sexo</label>
                                <div class="col-sm-4">
                                    <input type="text" id="sex" name="sex" class="form-control datepicker1" placeholder="ingrese la fecha de la reserva" autocomplete="off" />
                                </div>-->
                                <input type="hidden" value="" id="id-customer" name="id-customer">

                                <input type="hidden" value="" id="helper" name="helper">
                                <input type="hidden" value="{{ $idTable }}" id="id-table" name="id-table">
                                <input type="hidden" value="{{ $quantityPeople }}" id="quantityChairs-table" name="quantityChairs-table">
                                <input type="hidden" value="{{ date('d-m-Y') }}" id="day-reservation" name="day-reservation">
                                <input type="hidden" value="{{ $dateView }}" id="dateReservation-table" name="dateReservation-table">

                            </div>
                            <br>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <input class="btn btn-success" type="submit" value="Completar reserva"/>

                                    <button type="button" class="btn btn-danger">Cancelar Reserva</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card card-secondary">
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
            //.on('changeDate', function (selected) {
            //var date1 = $(".datepicker1").datepicker('getDate')
          //  $('#birthday').val(date1);
        //});
        $('#phone').autocomplete({
            source: '{!! url('/searchCustomer') !!}',
            minlength:1,
            select:function (event, ui) {
                $('#id-customer').val(ui.item.id);
                $('#birthday').val(ui.item.birthday);
                $('#first-name').val(ui.item.name);
                $('#last-name').val(ui.item.lastname);
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