<!--
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 04-10-17
 * Time: 08:32 PM
 */-->
@extends('layouts.app')

@section('title', 'Información Reserva')
@section('title-description', 'detalle de reservas')

@section('content')
    <section class="jumbotron">
        <div class="container">
            <h1 class="jumbotron-heading">Código de la reserva : {{ $reservation->reservations_id }}</h1>
            <div class="card-block">
                <p class="leads"><b>Día de la reserva : </b> {{ $reservation->created_at }}</p>
                <p class="leads"><b>Tipo de mesa : </b> {{ $reservation->typeTable }}</p>
                <p class="leads"><b>Apellido : </b> {{ $reservation->lastName }} </p>
                <p class="leads"><b>Nombre : </b> {{ $reservation->name }} </p>
                <p class="leads"><b>Carnet identidad : </b> {{ $reservation->ci }}</p>
                <p class="leads"><b>Telefono : </b> {{ $reservation->phone }}</p>
            </div>
        </div>
    </section>
@endsection