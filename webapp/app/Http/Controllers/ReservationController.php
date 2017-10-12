<?php

namespace App\Http\Controllers;

use App\Customer;
use App\People;
use App\Reservation;

use App\Table;
use App\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::all();
        return view('reservation.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Obteniendo los datos del cliente
        $phone      = $request->input('phone');
        $birthday   = $request->input('birthday');
        $name       = $request->input('first-name');
        $lastName   = $request->input('last-name');
        $address    = $request->input('address');
        $ci         = $request->input('ci');

        //  Obteniendo los datos de la mesa a ser reservada
        $dayReservation     = $request->input('day-reservation');
        $idCustomer         = $request->input('id_customer');
        $idTable            = $request->input('id-table');
        $reservationDate    = $request->input('checkDate');

        // Helper
        $helper = $request->input('helper');

        // registrar datos del cliente => TRUE
        // no registrar datos del cliente => FALSE
        // ###################### TRANSACCIONES #################################
         DB::beginTransaction();
        try{
        if ($helper != 1){
            $clientType = 'nuevo';

            // Guardamos los datos personales del cliente a la tabla 'PEOPLE'
            DB::table('people')->insert([
                'ci'        => $ci,
                'name'      => $name,
                'lastName'  => $lastName,
                'birthday'  => $birthday,
                'phone'     => $phone,
                'sex'       => '',
                'address'   => $address
                ]);
            //Hacemos una consulta para obtener la llave primaria de 'Customers'
            $idPeople = People::all()->last()->id;

            // Guardamos al cliente como usuario nuevo y con cero puntos en la tabla 'CUSTOMERS'
            DB::table('customers')->insert([
                'clientType'    => $clientType,
                'points'        => '0',
                'people_id'     => $idPeople
            ]);
            $idCustomer = Customer::all()->last()->id;
        }

        // Guardamos la reservacion con las llaves foraneas de 'CUSTOMERS' , 'USERS'
        DB::table('reservations')->insert([
           'reservationDate'    => $reservationDate,
           'users_id'           => '1',             ///MODIFICAR
           'customers_id'       => $idCustomer
        ]);

        // Obtenemos el id de la reserva registrada anteriormente.
        $idReservation = Reservation::all()->last()->id;

        // Guardamos la mesa de la reserva.
        DB::table('tables_reservations')->insert([
            'tableReservationDate'  => $reservationDate,
            'tables_id'             => $idTable,
            'reservations_id'       => $idReservation,
            'stateTable'            => 'No disponible'
        ]);
            DB::commit();
         return redirect('/reservation/'.$idReservation);

        }catch (Exception $e){
            DB::rollback();
            return view('reservation.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idReservation = $id;

       $reservation = DB::table('reservations')
           ->join('tables_reservations', 'reservations.id', '=', 'tables_reservations.reservations_id')
           ->join('tables', 'tables_reservations.tables_id', '=', 'tables.id')
           ->join('customers', 'reservations.customers_id', '=', 'customers.id')
           ->join('people', 'customers.people_id', '=', 'people.id')
           ->where('reservations.id', '=', $idReservation)
           ->first();
        return view('reservation.registered', compact(['reservation']));
    }

    public function getReservation(Request $request)
    {
        $idReservation = $request->input('id');
        $reservation = DB::table('reservations')
            ->join('tables_reservations', 'reservations.id', '=', 'tables_reservations.reservations_id')
            ->join('tables', 'tables_reservations.tables_id', '=', 'tables.id')
            ->join('customers', 'reservations.customers_id', '=', 'customers.id')
            ->join('people', 'customers.people_id', '=', 'people.id')
            ->where('reservations.id', '=', $idReservation)
            ->first();

        return response()->json($reservation);
    }

}
