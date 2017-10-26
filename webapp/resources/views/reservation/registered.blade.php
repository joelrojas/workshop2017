<!--
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 04-10-17
 * Time: 08:32 PM
 */-->
@extends('layouts.app')

@section('title', 'Información Reserva')
@section('title-description', 'Detalle de reservas')

@section('content')<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <br>
            <h3 class="card-title"><b>DETALLE DE LA RESERVA</b>
                <a onclick="changeStateReservation({{$reservation->reservations_id}})" class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px"><i class="ti-settings"></i> CAMBIAR ESTADO DE RESERVA</a>
            </h3>
            <hr>
        </div>

        <div class="card-content">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>INFORMACIÓN DE LA RESERVA</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-8">
                                    <p class="leads"><b>Codigo de la reserva :</b> {{$reservation->reservations_id}}</p>
                                    <p class="leads"><b>Estado de la reserva :</b> {{$reservation->state_reservation}}</p>
                                    <p class="leads"><b>Fecha a reservar :</b> {{ date('d-m-Y', strtotime($reservation->reservationDate)) }}</p>
                                    <p class="leads"><b>Fecha que se realizo la reserva :</b> {{ $reservation->created_at }}</p>
                                </div>
                                <div class="col-xs-3">
                                    @include('reservation.styles.icon_color_reservation')
                                        <br><i class="ti-na"></i>
                                    </div>
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
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>INFORMACIÓN DEL CLIENTE</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-8">
                                    <p class="leads"><b>Carnet del cliente :</b> {{ $reservation->ci }}</p>
                                    <p class="leads"><b>Apellido del cliente :</b> {{$reservation->lastName}}</p>
                                    <p class="leads"><b>Nombre del cliente :</b> {{$reservation->name}}</p>
                                    <p class="leads"><b>Telefono del cliente :</b> {{ $reservation->phone }}</p>

                                </div>
                                <div class="col-xs-3">
                                    @include('reservation.styles.icon_color_reservation')
                                        <br><i class="ti-user"></i>
                                    </div>
                                </div>
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
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        @include('reservation.styles.type_color_reservation')
                            <p><b>ESTADO DE CLIENTE</b></p>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-8">
                                    <p class="leads"><b>Tipo de cliente :</b> {{$reservation->clientType}}</p>
                                    <p class="leads"><b>Puntos del cliente :</b> {{$reservation->points}}</p>
                                    <p class="leads"><b>Ultima visita :</b> {{ $reservation->updated_at}}</p>
                                    <p class="leads"><b>Producto preferido:</b> Baradero </p>
                                </div>
                                <div class="col-xs-3">
                                    @include('reservation.styles.icon_color_reservation')
                                    <br><i class="ti-zoom-in"></i>
                                    </div>
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
            @include('reservation.styles.information_reservation')
            <a href="/reservation" class="btn btn-block btn-fill btn-primary">ir a lista de reservas</a>
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
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/js/paper-dashboard.js?v=1.2.1') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script type="text/javascript">
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

    </script>
@endsection
