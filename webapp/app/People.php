<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'ci',
        'name',
        'lastName',
        'birthday',
        'phone',
        'sex',
        'address'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

}
