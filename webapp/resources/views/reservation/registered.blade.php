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
                <a onclick="addCatalog()" class="btn btn-group btn-default btn-wd btn-fill pull-right" style="margin-top: -8px"><i class="ti-settings"></i> CAMBIAR ESTADO DE RESERVA</a>
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
