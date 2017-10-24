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
                <div class="card-header">
                    <h3 class="title"> <b>Listado de Reservas</b>
                        <a href="{{ url('/reservation/create') }}" class="btn btn-primary btn-fill pull-right">Registrar reserva</a>
                    </h3>
                    <div class="card-content table-responsive">
                        <table id="mainTable" class="table table-striped">
                            <thead class="thead-inverse">
                            <tr>
                                <th><b>Codigo</b></th>
                                <th><b>Apellido</b></th>
                                <th><b>Nombre</b></th>
                                <th><b>Telefono</b></th>
                                <th><b>Tipo de cliente</b></th>
                                <th><b>Estado Reserva</b></th>
                                <th><b>Fecha Reserva</b></th>
                                <th><b>Opciones</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap modal -->
    <!-- <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
    </div>
    </div>
    </div>
    -->
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

       // $(document).ready(function() {
            var table = $('#mainTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.reservations.index') }}",
                "columns": [
                    { data: 'id', name: 'id'},
                    { data: 'lastName', name: 'lastName'},
                    { data: 'name', name: 'name'},
                    { data: 'phone', name: 'phone'},
                    { data: 'clientType' , name: 'clientType'},
                    { data: 'state', name: 'state'},
                    { data: 'reservationDate', name: 'reservationDate'},
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                    //{ defaultContent: "<button type=\"button\" class=\"btn btn-primary btn-detail open_modal\"> ver detalle</button> <button class=\"btn btn-danger\"> Cancelar</button>" }
                ]
            });
      //  });

       function cancelReservation(id){
           save_method = "cancel";
           $('input[name=_method]').val('PATCH');
           $('#modal-form form')[0].reset();

           $.ajax({
               url: "{{ url('reservation') }}" + '/' + id,
               type: "GET",
               dataType: "JSON",
               success: function (data) {
                   $('#modal-form').modal('show');
                   $('.modal-title').text('Cancelar Reserva');

                   $('#id').val(data.id);
                   $('#name').val(data.name);
                   $('#lastName').val(data.lastName);
                   $('#reservationDate').val(data.reservationDate);

               },
               error: function() {
                   swal('¡Error!', '<b>No se pueden obtener los datos de este catalogo, Intente mas tarde</b>', 'error');
               }
           });
       }

       $(function () {
           $('#modal-form form').validator().on('submit', function (e) {
               var url;
               if(!e.isDefaultPrevented()){
                   var id = $('#id').val();
                   //if(save_method == 'add') url = "{{ url('reservation') }}";
                   //else url = "{{ url('catalog'). '/' }}" + id;

                   $.ajax({
                       url: "{{ url('reservation') }}" + '/' + id + "/cancel",
                       type: "POST",
                       data: $('#modal-form form').serialize(),
                       success: function(data){
                           $('#modal-form').modal('hide');
                           table.ajax.reload();
                       },
                       error : function(){
                           alert('ERROR, al cancelar la reserva');
                       }
                   });
                   return false;
               }
           })
       })

    </script>
@endsection
