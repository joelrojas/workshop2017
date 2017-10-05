<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    //Configuramos el nombre de nuestra tabla de la base de datos
    protected $table = 'tables_reservations';

    protected $fillable = [
        'tableReservationDate',
        'tables_id',
        'reservations_id',
        'stateTable',
    ];


}
