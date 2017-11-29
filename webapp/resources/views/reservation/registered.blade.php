<!--
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 04-10-17
 * Time: 08:32 PM
 */-->
@extends('layouts.app')
@section('css')
    {{-- Importando el css necesario para esta vista--}}
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <style>
        .ui-autocomplete {
            z-index: 5000;
        }
    </style>
@endsection


@section('title', 'Información Reserva')
@section('title-description', 'Detalle de reservas')

@section('content')<div class="container-fluid">
    <div id="state_reservation_script" value="{{$reservation->state_reservation}}" type="hidden" ></div>
    <div class="card">
        <div class="card-header">
            <br>
            <h3 class="card-title"><b>DETALLE DE LA RESERVA</b>
                <a onclick="changeStateReservation({{$reservation->reservations_id}})" class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px"><i class="ti-settings"></i> CAMBIAR ESTADO DE RESERVA</a>
            </h3>
            <hr>
        </div>
<div class="row">
    <div class="col-lg-3" id="maincol">
        <div class="card-content">
            <div class="row">
                <div class="col-lg-12 col-sm-6" id="colinfo">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>INFORMACIÓN DE LA RESERVA</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input value="{{$reservation->reservations_id}}" type="hidden" id="idreservation" name="id">
                                    <p id="reservation_id" class="leads"><b>Codigo de la reserva :</b> {{$reservation->reservations_id}}</p>
                                    <p class="leads"><b>Estado de la reserva :</b> {{$reservation->state_reservation}}</p>
                                    <p id="reservation_date" class="leads"><b>Fecha a reservar :</b> {{ date('d-m-Y', strtotime($reservation->reservationDate)) }}</p>
                                    <p class="leads"><b>Fecha que se realizo la reserva :</b> {{ $reservation->created_at }}</p>
                                </div>
                                <!--
                                <div class="col-xs-3">
                                    @include('reservation.styles.icon_color_reservation')
                                        <br><i class="ti-na"></i>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    <!-- <div class="card-footer">
                                <hr>
                                <div class="stats">
                                    <p class="leads"> <i class="ti-reload"></i> Fecha de modificación<b> {{ $reservation->updated_at }}</b></p>
                                </div>
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6" id="colclient">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>INFORMACIÓN DEL CLIENTE</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="leads"><b>Carnet del cliente :</b> {{ $reservation->ci }}</p>
                                    <p class="leads"><b>Apellido del cliente :</b> {{$reservation->lastName}}</p>
                                    <p class="leads"><b>Nombre del cliente :</b> {{$reservation->name}}</p>
                                    <p class="leads"><b>Telefono del cliente :</b> {{ $reservation->phone }}</p>

                                </div>
                                <!--
                                <div class="col-xs-3">

                                    @include('reservation.styles.icon_color_reservation')
                                        <br><i class="ti-user"></i>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                <!--   <div class="card-footer">
                                    <hr>
                                    <div class="stats">
                                        <p class="leads"> <i class="ti-reload"></i> Fecha de modificación<b> {{ $reservation->updated_at }}</b></p>
                                    </div>
                                </div> -->
                    </div>
                </div>
                <div class="col-lg-12 col-sm-6" id="colstate">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>ESTADO DE CLIENTE</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p class="leads"><b>Tipo de cliente :</b> {{$reservation->clientType}}</p>
                                    <p class="leads"><b>Puntos del cliente :</b> {{$reservation->points}}</p>
                                    <p class="leads"><b>Ultima visita :</b> {{ $reservation->updated_at}}</p>
                                    <p class="leads"><b>Producto preferido:</b> Baradero </p>
                                </div>
                                <!-- <div class="col-xs-3">
                                    @include('reservation.styles.icon_color_reservation')
                                    <br><i class="ti-zoom-in"></i>
                                    </div>
                                </div>  -->

                            </div>
                        </div>
      </div>
                        <!-- <div class="card-footer">
                            <hr>
                            <div class="stats">
                                <p class="leads"> <i class="ti-reload"></i> Fecha de modificación<b> {{ $reservation->updated_at }}</b></p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
    </div>
<div class="col-lg-9 ">

    <div class="col-lg-12">
    <div class="card">
    @include('reservation.styles.information_reservation')

    <a href="/reservation" class="btn btn-block btn-fill btn-primary">ir a lista de reservas</a>
    <a href="/bill" id="BillButton" class="btn btn-block btn-fill btn-primary">imprimir factura</a>

    </div>
    </div>
</div>
</div>
    <section class="jumbotron">
    </section>
@endsection
@section('modal')
    <div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" class="form-horizontal" data-toggle="validator">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span arria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title"></h3>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="customers_id" name="customers_id"><br>
                        <div class="form-group">
                            <label for="state_reservation" class="col-md-3 control-label">Estado de la reserva</label>
                            <div class="col-md-6">
                                <select class="form-control" name="state_reservation" id="state_reservation">
                                    <option value="{{ $reservation->state_reservation }}">{{ $reservation->state_reservation }}</option>
                                    <option value="en espera">en espera</option>
                                    <option value="en curso">en curso</option>
                                    <option value="completado">completado</option>
                                    <option value="cancelado">cancelado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Descripción</label>
                            <div class="col-md-6">
                                <input type="text" id="description" name="description" class="form-control" required autocomplete="off" >
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save" >Enviar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="buy-product" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" class="form-horizontal" data-toggle="validator">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span arria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title">Comprar producto</h3>
                    </div>

                    <div class="modal-body">
                        <!-- <input type="hidden" id="id" name="id"> -->
                        <!-- <input type="hidden" id="customers_id" name="customers_id"><br> -->
                        <div class="form-group">
                            <label for="state_reservation" class="col-md-3 control-label">Producto</label>

                            <div class="col-md-6">
                            <!-- <select class="form-control" name="product_list" id="product_list">
                                   @foreach($products as $product)

                                    <option value="{{ $product->id }}">{{ $product->name}}</option>
                                    @endforeach
                                 </select>
                                 -->
                                <input type="text" id="name_product" name="name_product" class="form-control" required autocomplete="off" >
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Cantidad</label>
                            <div class="col-md-6">
                                <input type="text" id="quantity_product" name="quantity_product" class="form-control" required autocomplete="off" >
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="addproduct" type="button" class="btn btn-primary btn-save">Enviar</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        //Script para autocomplete de producto en el modal

        var table = $('#sellsTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('api.details.sells') }}",
            "columns": [
                { data: 'id', name: 'id' },
                { data: 'quan', name: 'quan' },
                { data: 'productname', name: 'productname' },
                { data: 'price', name: 'price' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]

        });
        var flag=0;


        $('#addproduct').on('click',function () {

            flag+=1;
            //alert(flag);

            //alert('flag:'+flag);
            //alert($('#idproduct').val());
            $.ajax({
                type: 'POST',
                url: "/buyproduct",
                data:{
                    '_token':$('input[name=_token]').val(),
                    //'date':$('#reservation_date').val(),
                    'date':'07-11-2017',
                    'quantity':$('#quantity_product').val(),
                    'idproduct':$('#idproduct').val(),
                    'idreservation':$('#idreservation').val(),
                    //'productSupplied':JSON.stringify($('#productaddlist').val()),
                    'price':500,
                    'flag':flag

                },
                success:function () {
                    swal('Producto añadido');
                    table.ajax.reload();

                }
            })
        });

        $('#BillButton').on('click',function(){
            //alert($('#idstate').val());
            $.ajax({
                type: 'POST',
                url: '/EditStateOrder',
                data:{
                    '_token': $('input[name=_token]').val(),
                    'id':$('#idstate').val(),
                    'state':$('#statelist').val()
                },
                success:function (dato) {
                    swal('Modificado con Exito');

                    table.ajax.reload();
                    //  $.toaster({ priority : 'success', title : 'Modificado', message : 'Se modificaron los datos correctamente'});
                }

            })
        });



        $('#name_product').autocomplete({
            source: '{{ route('search.product') }}',
            minlength: 1,
            select: function (event, ui) {
                $('#idproduct').val(ui.item.id);

                // $('#product').val(ui.item.id);
            }
        });

        $( document ).ready(function() {
            var state_element=document.querySelector('#state_reservation_script');
            var state=state_element.getAttribute('value');
            //alert(state) ;
            if(state==='cancelado' || state==='en espera')
            {
                var maincol=document.querySelector('#maincol');
                var colinfo=document.querySelector('#colinfo');
                var colstate=document.querySelector('#colstate');
                var colclient=document.querySelector('#colclient');
               // alert(colinfo.getAttribute('class'));
             maincol.setAttribute('class','col-lg-12');
             colinfo.setAttribute('class','col-sm-4');
             colstate.setAttribute('class','col-sm-4');
             colclient.setAttribute('class','col-sm-4');
             //$('#colclient').setAttribute('class',' ');
             //$('#colstate').setAttribute('class',' ');
            }
        });

        $('#add_product').on('click',function () {
            $('#buy-product').modal('show');
        });
        function changeStateReservation(id){
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();

            $.ajax({
                url: "{{ url('reservation') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Cambiar el estado de reservas');
                    $('#id').val(data.reservations_id);
                    $('#customers_id').val(data.customers_id);
                    $('#state').val(data.state_reservation);
                    $('#description').val(data.description);
                },
                error: function() {
                    swal('¡Error!', '<b>No se pueden obtener los datos de este catalogo, Intente mas tarde</b>', 'error');
                }
            });
        }
        $(function () {
            $('#modal-form form').validate({
                rules:{
                    description: {
                        required:true,
                        minlength: 5
                    }
                },
                messages:{
                    description: {
                        required: 'El campo descripcion requerido.',
                        minlength: 'La descripción debe ser mas de 15 letras'
                    }
                },
                submitHandler: function() {
                    var url;
                    var id = $('#id').val();
                    url = "{{ url('reservation'). '/' }}" + id;
                    console.log(save_method);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#modal-form form').serialize(),
                        success: function(data){
                            $('#modal-form').modal('hide');
                            //table.ajax.reload();
                            location.href = data.show;
                        },
                        error : function(){
                            alert('ERROR, al editar');
                        }
                    });
                    return false;

                }
            });
        })

        function deleteSell(id){
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
                title: '¿Está seguro de eliminar a esta venta?',
                text: "'¡No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3189d6',
                cancelButtonColor: '#EA4101',
                confirmButtonText: 'Si, bórralo!',
                cancelButtonText: 'No, cancelar!',
            }).then(function () {

                $.ajax({
                    url: "api/sell" + '/' + id +'/' +'delete',
                    type: "POST",
                    data: {'_token': csrf_token,
                    'id':id
                    },
                    success: function(data){
                        table.ajax.reload();
                        swal({
                            title: 'Borrado!',
                            text: 'El dato fue eliminado.',
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error: function() {
                        swal({
                            title: '¡Error!',
                            text: '<b>No se pueden eliminar este catalogo, Intente mas tarde</b>',
                            type: 'error',
                            timer: '1500'
                        });
                    }
                });
            });
        }

    </script>
@endsection
