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
use App\Supplier;

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
                        '<a onclick="editCatalog('. $catalog->id .')" class="btn btn-default btn-group-xs btn-fill "><i class="ti ti-marker"></i> Editar</a>'.
                        '<a onclick="deleteCatalog('. $catalog->id .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Eliminar</a>'.
                        '</div>';
            })->make(true);

    }

    public function getReservations(Request $request)
    {
        $type_reservations = $request['request'];
        $reservations = $this->queryReservations($type_reservations);
        return DataTables::of($reservations)
            ->addColumn('state', function ($reservations){
                if($reservations->state_reservation == 'en espera') return '<span class="label label-warning"> EN ESPERA</span>';
                elseif ($reservations->state_reservation == 'cancelado') return '<span class="label label-danger"> CANCELADO</span>';
                elseif ($reservations->state_reservation == 'completado') return '<span class="label label-success"> COMPLETADO</span>';
                else return '<span class="label label-info"> EN CURSO</span>';
            })
            ->addColumn('action', function ($reservations) {
                return '<div class="table-icons">'.
                    '<a href="/reservation/'. $reservations->id .'" class="btn btn-default btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver Reserva</a>' .
                    //' <a onclick="cancelReservation('. $reservations->id .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Cancelar Reserva</a>'.
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
    /*
    public function getOrders()
    {
        $query = DB::table('orders')
            ->join('orders','orders.suppliers_products_id','=','suppliers_products.id')
            ->join('products','products.id','=','suppliers_products.products_id')
            ->join('suppliers','suppliers.id','=','suppliers_products.suppliers_id')
            ->select('orders.*','products.*','suppliers.*','orders.id')

            //$supplier = Supplier::select('id', 'companyName', 'productSupplied','contactName');

            // $data= DB::table('details_orders')
            ->get();
        //$data=DB::table('details_orders')->get();
        return DataTables::of($query)
            ->addColumn('action', function($query) {

                //'<a href="#" class="btn btn-info btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver</a>'.
                if($query->CAT_ORDERSTATUS == "recibido")
                {
                    return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-success btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                        '</div>';
                }else{
                    if($query->CAT_ORDERSTATUS == "rechazado")
                    {
                        return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-danger btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                            '</div>';
                    }else{
                        if($query->CAT_ORDERSTATUS == "cancelado")
                        {
                            return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-danger btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                                '</div>';
                        }else{
                            if($query->CAT_ORDERSTATUS == "devuelto")
                            {
                                return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-warning btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                                    '</div>';
                            }
                        }
                    }
                }

            })
            ->toJson();

    }
    */
    public function getOrders()
    {
        $query = DB::table('details_orders')
            ->join('orders','orders.id','=','details_orders.orders_id')
            ->join('products','products.id','=','details_orders.products_id')
            ->join('suppliers_products','orders.suppliers_products_id','=','suppliers_products.id')
            ->join('suppliers','suppliers.id','=','suppliers_products.suppliers_id')
            ->select('orders.*','products.*','orders.id as idorder','suppliers.*','details_orders.*','details_orders.id')

        //$supplier = Supplier::select('id', 'companyName', 'productSupplied','contactName');

       // $data= DB::table('details_orders')
            ->get();
        $data=DB::table('details_orders')->get();
        return DataTables::of($query)
            ->addColumn('action', function($query) {

                    //'<a href="#" class="btn btn-info btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver</a>'.
                    if($query->CAT_ORDERSTATUS == "recibido")
                    {
                        return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-success btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                        '</div>';
                    }else{
                    if($query->CAT_ORDERSTATUS == "rechazado")
                    {
                        return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-danger btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                        '</div>';
                    }else{
                        if($query->CAT_ORDERSTATUS == "cancelado")
                        {
                            return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-danger btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                                '</div>';
                        }else{
                            if($query->CAT_ORDERSTATUS == "devuelto")
                            {
                                    return  '<div class="table-icons">'.'<a onclick="editSupplier('. $query->id .')" class="btn btn-warning btn-fill btn-wd">'.$query->CAT_ORDERSTATUS.'</a>'.
                                        '</div>';
                            }
                        }
                    }
                    }

            })
            ->toJson();
    }

    public function getSells()
    {

        $query = DB::table('details_sells')
            ->join('orders','orders.id','=','details_orders.orders_id')
            ->join('products','products.id','=','details_orders.products_id')
            ->join('suppliers','suppliers.id','=','orders.suppliers_id')
            ->select('orders.*','products.*','suppliers.*')
            ->get();
        return datatables($query)
            ->toJson();

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

    public function getSuppliers()
    {
        $supplier = Supplier::select('id', 'companyName', 'productSupplied','contactName');
        return DataTables::of($supplier)
            ->addColumn('action', function($supplier) {
                return  '<div class="table-icons">'.
                    //'<a href="#" class="btn btn-info btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver</a>'.
                    '<a onclick="editSupplier('. $supplier->id .')" class="btn btn-primary btn-group-xs btn-fill "><i class="ti ti-marker"></i> Editar</a>'.
                    '<a onclick="deleteSupplier('. $supplier->id .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Eliminar</a>'.
                    '</div>';
            })->make(true);

    }

    public function queryReservations($today=null)
    {
        return DB::table('reservations')
            ->join('customers', 'reservations.customers_id', '=', 'customers.id')
            ->join('people', 'customers.people_id', '=', 'people.id')
            ->when($today, function ($query) use ($today) {
                $query->where('reservations.reservationDate', '=', date('Y-m-d'));
            })
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
    }

    public function getDetailsSells()
    {
        $query=DB::table('details')
                ->join('suppliers_products','suppliers_products.id','=','details.suppliers_products_id')
                ->join('products','products.id','=','suppliers_products.products_id')
                ->join('suppliers','suppliers.id','=','suppliers_products.suppliers_id')
                ->join('sells','sells.id','=','details.sells_id')
                ->select('products.*','details.id as detailsid','suppliers_products.*','sells.*','details.quantity as quan')
                ->get();
        return DataTables::of($query)
            ->addColumn('action',function ($query){
                return  '<div class="table-icons">'.
                    //'<a href="#" class="btn btn-info btn-group-xs btn-fill"><i class="ti ti-eye"></i> Ver</a>'.
                    '<a onclick="editSell('. $query->detailsid .')" class="btn btn-primary btn-group-xs btn-fill "><i class="ti ti-marker"></i> Editar</a><br>'.
                    '<a onclick="deleteSell('. $query->detailsid .')" class="btn btn-danger btn-group-xs btn-fill "><i class="ti ti-trash"></i> Eliminar</a>'.
                    '</div>';
            })
            ->toJson();
    }
}
