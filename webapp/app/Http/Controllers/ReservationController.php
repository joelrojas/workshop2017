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
use function Sodium\compare;


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
        if(!count($request->input('id_table'))){
            $state  = 0;
            return response()->json([
                'state' => $state,
                'errorCode' => 1,
                'message' => 'Complete el formulario, Ingrese la mesa a reservar',
            ]);
        }
        $idCustomer         = $request->input('id_customer');
        $reservationDate    = $request->input('check_date');
         // FLAGS
        $helper = $request->input('helper');
        $state  = 1 ;
         DB::beginTransaction();
        try{
        if ($helper != 1){
            $clientType = 'nuevo';
            DB::table('people')->insert([
                    'ci'        => $request->input('ci'),
                    'name'      => $request->input('first_name'),
                    'lastName'  => $request->input('last_name'),
                    'birthday'  => $request->input('birthday'),
                    'phone'     => $request->input('phone'),
                    'sex'       => '',
                    'address'   => $request->input('address')
                ]);
            $idPeople = People::all()->last()->id;
            DB::table('customers')->insert([
                    'clientType'    => $clientType,
                    'points'        => '0',
                    'people_id'     => $idPeople
                    ]);
            $idCustomer = Customer::all()->last()->id;
        }
        DB::table('reservations')->insert([
           'reservationDate'    => $request->input('check_date'),
           'users_id'           => $request->input('id_user'),
           'customers_id'       => $idCustomer
        ]);
        $idReservation = Reservation::all()->last()->id;

        $idTable = $request->input('id_table');     // Array de los id de las mesas
        $nameTable = $request->input('name_table');  // Array de nombres de las mesas seleccionadas
        $typeTable = $request->input('type_table'); // Array de los tipos de mesa |VIP, NORMAL|
        $data= [];
            for($i=0; $i<count($idTable); $i++){
                $list = [
                    'tableReservationDate'  => $reservationDate,
                    'tables_id'             => $idTable[$i],
                    'reservations_id'       => $idReservation,
                    'stateTable'            => 'No disponible',
                    'nameTable'             => $nameTable[$i],
                    'typeTable'             => $typeTable[$i],
                ];
                array_push($data,$list);
            }
        DB::table('tables_reservations')->insert($data);
        DB::commit();

        $showReservation = '/reservation/'.$idReservation;

        return response()->json([
             'state' => $state,
             'show' => $showReservation,
        ]);

        }catch (\Exception $e){
            DB::rollback();
            $state  = 0;
            return response()->json([
                'state' => $state,
                'errorCode' => $e->getCode(),
                //'message' => '¡No se registraron los datos!',
                'message'  => $e->getMessage(),
                ]);
        }catch (\Throwable $e) {
            DB::rollBack();
            $state = 0;
            return response()->json([
                'state' => $state,
                'errorCode' => $e->getCode(),
                'message'=> $e->getMessage()
                ]);
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
        return view('reservation.registered', compact('reservation'));
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

    // BUSCAR POR MESA
    public function searchCatalogTables (Request $request)
    {
        $date = $request->input('date');
        $idTable = $request->input('typeTable');
                                //DB::table('tables_reservations')->where('tables_id', '=', $idTable)->get();
                                // ultimo parametro first() = 1, get() != 1, (default = 0)
        $existId = $this->query_where('tables_reservations', 'tables_id', '=', $idTable);

        if (!($existId->isEmpty())) {
            $existDate = $this->query_where('tables_reservations', 'tableReservationDate', '=', $date);
           // $existDate = DB::table('tables_reservations')->where('tableReservationDate', '=', $date)->get();
            if($existDate){
                $tablesOccupied = [];
                foreach ($existDate as $nameTables ) {
                    array_push($tablesOccupied,$nameTables->nameTable);
                }
                    // DB::table('tables')->where('id', '=', $idTable)->first();
                    // ultimo parametro first() = 1, get() != 1
                $table = $this->query_where('tables', 'id', '=', $idTable, 1);

                $nameCatalog = "CAT_".strtoupper($table->typeTable);
                $search = DB::table('catalogs')
                    ->where('name', '=', $nameCatalog)
                    ->whereNotIn('description',$tablesOccupied)
                    ->get();
            }
            else{
                $table = $table = $this->query_where('tables', 'id', '=', $idTable, 1);

                $nameCatalog = "CAT_".strtoupper($table->typeTable);
                $search = $this->query_where('catalogs', 'name', '=', $nameCatalog);
            }
        }
        else{
            $table = $this->query_where('tables', 'id', '=', $idTable, 1);
            $nameCatalog = "CAT_".strtoupper($table->typeTable);
            $search = $this->query_where('catalogs', 'name', '=', $nameCatalog);
        }

        return response()->json(['search'=>$search ]);
    }

    public function query_where($table, $column, $operation ='=',$value, $end = '0')
    {
        if($end == 1) return DB::table($table)->where($column, $operation, $value)->first();
        else return DB::table($table)->where($column, $operation, $value)->get();
    }


}
