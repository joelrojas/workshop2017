<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    public function getCatalogs()
    {
        $query = Catalog::select('id', 'name', 'description');
        return datatables($query)->make(true);
    }

    public function getReservations()
    {


        $query = DB::table('reservations')
            ->join('tables_reservations', 'reservations.id', '=', 'tables_reservations.reservations_id')
            ->join('tables', 'tables_reservations.tables_id', '=', 'tables.id')
            ->join('customers', 'reservations.customers_id', '=', 'customers.id')
            ->join('users', 'reservations.users_id', '=', 'users.id')
            ->join('people', 'customers.people_id', '=', 'people.id')
            ->select('reservations.*', 'tables_reservations.*', 'tables.*', 'customers.*', 'people.*')
            ->get();

        return datatables($query)->toJson();
    }


}
