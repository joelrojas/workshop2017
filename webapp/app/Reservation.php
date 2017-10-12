<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'reservationDate', 'users_id', 'customers_id', 'created_at', 'updated_at'
    ];
}
