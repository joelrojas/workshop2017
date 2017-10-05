<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Reservation;
use App\users_tasks;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getCatalogs()
    {
        $query = Catalog::select('id', 'name', 'description');
        return datatables($query)->make(true);
    }

    public function getReservations()
    {
        $query = Reservation::select('id', 'creationDate', 'reservationDate', 'peopleQuantity');
        return datatables($query)->make(true);
    }
    public function getTasks()
    {
        $query = users_tasks::select('id', 'state', 'dateBegin', 'dateEnd');
        return datatables($query)->make(true);
    }

}
