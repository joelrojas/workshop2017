<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerHistory extends Model
{
    protected $table = ['customer_history'];
    protected $fillable = ['dateHistory', 'observation', 'customers_id'];
}
