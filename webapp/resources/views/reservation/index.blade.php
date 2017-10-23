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
            <a href="{{ url('/reservation/create') }}" class="btn btn-primary">Registrar reserva</a>
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> <b>Listado de Reservas</b> </h3>
                    </div>
                        <table id="mainTable" class="table table-sm ">
                            <thead class="thead-inverse">
                            <tr>
                                <th>Codigo Reserva</th>
                                <th>Nombre Completo</th>
                                <th>Fecha Reserva</th>
                                <th>Mesa</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                    <h3 class="modal-title">Información de la reserva</h3>
                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                        <h5 class="modal-title"><b>Detalle de la Reserva</b></h5>
                        <hr>
                        <div class="form-row">
                            <input type="hidden" value="" name="idpeople" id="idpeople"/>
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">Codigo de la reserva</label>
                                <input type="text" class="form-control" id="idReservation" name="idReservation" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Fecha de la reserva</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">Tipo de cliente</label>
                                <input type="text" class="form-control" id="clientType" name="clientType" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Tipo de mesa</label>
                                <input type="text" class="form-control" id="typeTable" name="typeTable" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <input type="hidden" value="" name="idpeople" id="idpeople"/>
                            <input type="hidden" value="" name="idReservation" id="idReservation"/>
                            <div class="form-group col-md-6">
                                <label class="control-label">Apellido completo </label>
                                <input type="text" class="form-control" id="lastName" name="lastName" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label" >Nombre completo</label>
                                <input type="text" class="form-control" id="name" name="name" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Carnet de identidad</label>
                                <input type="text" class="form-control" id="ci" name="ci" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="control-label">Telefono</label>
                                <input type="text" class="form-control" id="phone" name="phone" disabled>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-danger">Cancelar reserva</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets/js/validator.min.js') }}"></script>


    <script type="text/javascript">

        $(document).ready(function() {
            var table = $('#mainTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.reservations.index') }}",
                "columns": [
                    { data: 'id'},
                    { data: 'name'},
                    { data: 'reservationDate' },
                    { data: 'nameTable' },
                    { defaultContent: "<button type=\"button\" class=\"btn btn-primary btn-detail open_modal\"> ver detalle</button> <button class=\"btn btn-danger\"> Cancelar</button>" }
                ]
            });

            $('#mainTable tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                $.ajax({
                   type: 'GET',
                   url: '/getReservation',
                   data: data,
                    success: function (data) {
                        console.log(data);
                        $('#idReservation').val(data['reservations_id']);
                        $('#idpeople').val(data['id']);
                        $('#ci').val(data['ci']);
                        $('#name').val(data['name']);
                        $('#lastName').val(data['lastName']);
                        $('#reservationDate').val(data['reservationDate']);
                        $('#phone').val(data['phone']);
                        $('#clientType').val(data['clientType']);
                        $('#typeTable').val(data['typeTable']);
                        $('#created_at').val(data['created_at']);

                        $('#modal_form').modal('show');
                    }
                });

            } );

        });

        $(function() {
            $('.datepicker1').datepicker( {
                todayHighlight: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
                startDate: new Date(),
            }).on('changeDate', function (selected) {
                var date1 = $(".datepicker1").datepicker('getDate')
                if(date1){
                    check_availbility();
                }
                else{
                    $.toaster({ priority : 'danger', title : 'Fallo', message : 'Ingrese la fecha de la reserva'});
                }
            });
            function check_availbility() {
                $.ajax({
                    url: '{{ url('/searchTable') }}',
                    type:'POST',
                    data:$('#SearchTable').serialize(),
                    success:function(result){
                        var obj = result.x;
                        var data = result.search;
                        var dateReservation = result.dateReservation;
                        if(obj==1)
                        {
                            $('#orderdata').html(data);
                            $('#next').show();
                            $.toaster({ priority : 'success', title : 'Éxito', message : 'Mesa disponible'});

                            document.getElementById("id-table").value = data.id;
                            document.getElementById("quantityChairs-table").value = data.quantityChair;
                            document.getElementById("dateReservation-table").value = dateReservation;

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
