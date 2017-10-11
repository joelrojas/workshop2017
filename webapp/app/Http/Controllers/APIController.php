<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Reservation;
use App\Users_task;
use App\users_tasks;
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
    public function getTasks()
    {
        $query = Users_task::select('id', 'state', 'dateBegin', 'dateEnd');
        return datatables($query)->make(true);
    }

    public function getUsers()
    {
        $query = DB::table('users')
            ->join('people', 'people.id', '=', 'users.people_id')
            ->select('people.*', 'users.*')
            ->get();
        return datatables($query)->toJson();
    }

}
