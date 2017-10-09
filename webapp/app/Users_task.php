<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_task extends Model
{
    protected $table = 'users_tasks';

    protected $fillable = [
        'date',
        'state',
        'dateEnd',
        'dateBegin',
        'users_id',
        'tasks_id',
    ];
}
