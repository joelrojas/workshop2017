<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\TableReservation;

class Table extends Model
{
    protected $fillable = [
        'quantityChair'
    ];

    public function searchTable()
    {
        return $this->hasMany(\App\TableReservation::class, 'tables_id', 'id');
    }
}
