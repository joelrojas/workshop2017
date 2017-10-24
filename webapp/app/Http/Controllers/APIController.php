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
        $reservations = DB::table('reservations')
            ->join('customers', 'reservations.customers_id', '=', 'customers.id')
            ->join('people', 'customers.people_id', '=', 'people.id')
            ->select(
                'reservations.id',
                'reservations.reservationDate',
                'reservations.state_reservation',
                'people.name',
                'people.lastName',
                'people.phone',
                'customers.id as id_customer',
                'customers.clientType')
            ->orderBy('reservations.reservationDate')
            //->groupBy('people.id', 'reservations.id', 'customers.id')
            ->get();

        return DataTables::of($reservations)
            ->addColumn('state', function ($reservations){
                if($reservations->state_reservation == 'en espera') return '<span class="label label-info"> EN ESPERA</span>';
                elseif ($reservations->state_reservation == 'cancelado') return '<span class="label label-danger"> CANCELADO</span>';
                elseif ($reservations->state_reservation == 'completado') return '<span class="label label-success"> COMPLETADO</span>';
                else return '<span class="label label-primary"> EN CURSO</span>';
            })
            ->addColumn('action', function ($reservations) {
                return '<div class="table-icons">'.
                    '<a href="reservation/'. $reservations->id .'" class="btn btn-primary btn-group-xs btn-fill "><i class="ti ti-eye"></i> Ver Reserva</a>'.
                    '<a onclick="cancelReservation('. $reservations->id .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Cancelar Reserva</a>'.
                    '</div>';
            })
            ->rawColumns(['state', 'action'])
            ->make(true);
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
        $query = DB::table('users')
            ->join('people', 'people.id', '=', 'users.people_id')
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
