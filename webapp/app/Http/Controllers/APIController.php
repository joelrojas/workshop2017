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
            ->select('reservations.*', 'tables_reservations.tableReservationDate', 'tables.typeTable', 'people.name')
            ->get();

        return datatables($query)->toJson();
    }
    public function getTasks()
    {
        $query = DB::table('users_tasks')
            ->join('users', 'users.id', '=', 'users_tasks.users_id')
            ->join('tasks', 'users_tasks.tasks_id', '=', 'tasks.id')
            ->join('people', 'users.people_id', '=', 'people.id')
            ->select('users.*', 'users_tasks.*', 'tasks.*', 'people.*','users_tasks.id as idtask')
            ->get();

        return datatables($query)->toJson();

    }

    public function getUsers()
    {
        $query = DB::table('people')
            ->join('users', 'people.id', '=', 'users.people_id')
            ->select('people.*', 'users.*','people.id as idpeople')
            ->get();
        return datatables($query)->toJson();
    }

}
