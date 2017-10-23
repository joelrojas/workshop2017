<?php

namespace App\Http\Controllers;


use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function searchTable(Request $request){

        // Obtenemos la cantidad de personas

        $quantityChairs = $request->input('quantityPeople');

        // Obtenemos y Modificamos la fecha de la reserva de d-m-Y --> Y-m-d
        $reservationDate = date("Y-m-d",strtotime($request->input('checkDate')));

        //Haciendo la consulta para ver si tenemos la mesa para esa cantidad de personas.

        $chairResult = Table::where('quantityChair', $quantityChairs)->first();

        //Verificamos que la consulta no este vacia.

        if (!empty($chairResult)) {

            // Verificamos que la mesa no este reservada en la fecha solicitada

            $search = Table::whereHas('searchTable', function ($query) use($chairResult, $reservationDate) {
                $query->orWhere('tables_id', $chairResult->id);
                $query->where('tableReservationDate', '!=', $reservationDate);
            })->first();

            if(!empty($search)) {
                $result = 1;
                $search = $chairResult;
            } else {
                $result = 1;
                $search = $chairResult;
            }

        }
        else {
            $result = 0;
            $search = '';
        }
        return response()->json(['x'=> $result,'search'=>$search, 'dateReservation' =>$reservationDate ]);
    }
}
