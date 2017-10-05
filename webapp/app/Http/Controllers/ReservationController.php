<?php

namespace App\Http\Controllers;

use App\Customer;
use App\People;
use App\Reservation;

use App\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        //
    }

    // Controlador del registro de reserva.

    public function registerReservation(Request $request)
    {
        $idTable            = $request->input('id-table');
        $quantityPeople     = $request->input('quantityChairs-table');
        $reservationDate    = $request->input('dateReservation-table');
        $dateView           = $request->checkDate;

        return view('reservation.create', compact(['idTable', 'quantityPeople', 'reservationDate', 'dateView']));
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
        $phone      =   $request->input('phone');
        $birthday   =   $request->input('birthday');
        $name       =   $request->input('first-name');
        $lastName   =   $request->input('last-name');
        $address    =   $request->input('address');

        //  Obteniendo los datos de la mesa a ser reservada
        $dayReservation     =   $request->input('day-reservation');
        $idCustomer         =   $request->input('id-customer');
        $idTable            =   $request->input('id-table');
        $quantityPeople     =   $request->input('quantityChairs-table');
        $reservationDate    =   $request->input('dateReservation-table');

        // Helper
        $helper = $request->input('helper');

        // registrar datos del cliente => TRUE
        // no registrar datos del cliente => FALSE


        // ###################### TRANSACCIONES #################################

        /* DB::beginTransaction();
        try{ */

        if ($helper != 1){

            $clientType = 'nuevo';
            // Guardamos los datos personales del cliente a la tabla 'PEOPLE'
            $people = new People();
            $people->ci         = '';           //MODIFICAR
            $people->name       = $name;
            $people->lastName   = $lastName;
            $people->birthday   = $birthday;
            $people->phone      = $phone;
            $people->sex        = '';           //MODIFICAR
            $people->address    = $address;
            $people->save();

            //Hacemos una consulta para obtener la llave primaria de 'Customers'
           // $idPeople = People::all()->last();
            $idPeople = $people->id;

            // Guardamos al cliente como usuario nuevo y con cero puntos en la tabla 'CUSTOMERS'
            $customer = new Customer();
            $customer->clientType   = $clientType;
            $customer->points       =  '0';
            $customer->people_id    = $idPeople;
            $customer->save();

           // $idCustomer = Customer::all()->last();
            $idCustomer = $customer->id;

        }

        // Guardamos la reservacion con las llaves foraneas de 'CUSTOMERS' , 'USERS'
        $reservation = new Reservation();
        $reservation->creationDate      = $dayReservation;
        $reservation->reservationDate   = $reservationDate;
        $reservation->peopleQuantity    = $quantityPeople;
        $reservation->users_id           = '1';      ///MODIFICAR
        $reservation->customers_id       = $idCustomer;
        $reservation->save();

        // Obtenemos el id de la reserva registrada anteriormente.

        //$idReservation = Reservation::all()->last();
        $idReservation = $reservation->id;


        // Guardamos la mesa de la reserva.
        $tableReservation = new TableReservation();
        $tableReservation->tableReservationDate = $reservationDate;
        $tableReservation->tables_id            = $idTable;
        $tableReservation->reservations_id      = $idReservation;
        $tableReservation->stateTable           = 'No disponible';      //MODIFICAR
        $tableReservation->save();

         return redirect('/reservation/'.$idReservation);
       /*
        }catch (ValidationException $e){

            DB::rollback();
            return view('reservation.index');

        }
        DB::comit();*/
        ////
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

       /* $reservation = DB::table('reservations')
            ->join('users', 'users.id', '=', 'reservations.user_id')
            ->join('people', 'people.id' , '=', 'users.people_id')
            ->where('reservations.id', '=', $idReservation)
            ->first();*/

        dd($idReservation);
        //return view('reservation.registered', compact(['reservation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
