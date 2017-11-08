
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
    </div>
</div>
</div>
