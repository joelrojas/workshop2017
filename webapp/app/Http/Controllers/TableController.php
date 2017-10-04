<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function searchTable(Request $request){
        $quantityChairs = $request->quantityChairs;
        $reservationDate = $request->reservationDate;

        $tableResult = Table::where('stateTable', 'Nodisponible')->first();
        if ($tableResult) {
            $result = 1;

        } else {
            $result = 0;
        }
        $search = $tableResult;
        return response()->json(['x'=> $result,'search'=>$search]);
    }
}
