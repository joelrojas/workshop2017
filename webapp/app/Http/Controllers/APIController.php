<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Reservation;
use App\Users_task;
use App\users_tasks;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class APIController extends Controller
{
    public function getCatalogs()
    {
        //$query = Catalog::select('id', 'name', 'description');
        //return datatables($query)->make(true);
        $catalog = Catalog::select('id', 'name', 'description');
        return DataTables::of($catalog)
            ->addColumn('action', function($catalog) {
                return  '<div class="table-icons">'.
                        //'<a href="#" class="btn btn-info btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver</a>'.
                        '<a onclick="editCatalog('. $catalog->id .')" class="btn btn-primary btn-group-xs btn-fill "><i class="ti ti-marker"></i> Editar</a>'.
                        '<a onclick="deleteCatalog('. $catalog->id .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Eliminar</a>'.
                        '</div>';
            })->make(true);

    }

    public function getReservations()
    {
        $query = DB::table('reservations')
            ->join('tables_reservations', 'reservations.id', '=', 'tables_reservations.reservations_id')
            ->join('tables', 'tables_reservations.tables_id', '=', 'tables.id')
            ->join('customers', 'reservations.customers_id', '=', 'customers.id')
            ->join('users', 'reservations.users_id', '=', 'users.id')
            ->join('people', 'customers.people_id', '=', 'people.id')
            ->select('reservations.*', 'tables_reservations.*', 'tables.*', 'people.*')
            ->get();
        return datatables($query)->toJson();
    }

    public function getTasks()
    {
/*
        $arrStart = explode("/", Input::get('startDate'));
        $arrEnd = explode("/", Input::get('endDate'));
        $startDate = Carbon::create($arrStart[2], $arrStart[0], $arrStart[1], 0, 0, 0);
        $endDate = Carbon::create($arrEnd[2], $arrEnd[0], $arrEnd[1], 23, 59, 59);
        $query = DB::table('users_tasks')
            ->join('users', 'users.id', '=', 'users_tasks.users_id')
            ->join('tasks', 'users_tasks.tasks_id', '=', 'tasks.id')
            ->join('people', 'users.people_id', '=', 'people.id')
            ->select('users.*', 'users_tasks.*', 'tasks.*', 'people.*','users_tasks.id as idtask')
            ->whereBetween('users_tasks.dateBegin',[$startDate,$endDate])
            ->get();

        return datatables($query)->toJson();
*/

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

    public function getOrders()
    {
        $query = DB::table('details_orders')
            ->join('orders','orders.id','=','details_orders.orders_id')
            ->join('products','products.id','=','details_orders.products_id')
            ->join('suppliers','suppliers.id','=','orders.suppliers_id')
            ->select('orders.*','products.*','suppliers.*')
            ->get();
        return datatables($query)->toJson();
    }

    public function getKardex()
    {
        $query = DB::table('details_orders')
            ->join('orders','orders.id','=','details_orders.orders_id')
            ->join('products','products.id','=','details_orders.products_id')
            ->join('suppliers','suppliers.id','=','orders.suppliers_id')
            //->join('sells','sells.id','=','details.sells_id')
            //->join('products','products.id','=','details.products_id')
            ->select('orders.*','products.*','suppliers.*')
            ->get();
        return datatables($query)->make(true);
    }

}
