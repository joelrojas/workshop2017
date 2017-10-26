<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customerHistory(Request $request)
    {
        $idCustomer = $request->input('id_customer');
        $search = Customer::find($idCustomer);

        $customer_history = DB::table('customer_history')->where('customers_id',$idCustomer)->latest()->first();

        if(!empty($search)) {
            $result = 1;
        }
        else {
            $result = 0;
            $search = '';
        }
        return response()->json(['x'=> $result,'search'=>$search, 'history'=>$customer_history ]);
    }

    /*
    * Autocomplete de clientes por carnet de identidad
    */
    public function autocompleteCustomerByCi(Request $request)
    {
        $term   = $request->term;
        $column = 'ci';
        $result = $this->searchCustomer($column, $term);
        return response()->json($result);
    }

    /*
     * Creamos esta función para realizar busqueda de cliente
     * donde pasamos dos parametros
     * @PARAMETROS
     * $column  es la nombre del campo o columna a buscar
     * $term    es la variable a buscar
     * @RETURN
     * retornamos en un array los datos encontrados.
     */
    private function searchCustomer($column, $term)
    {
        $query = DB::table('people')
            ->join('customers', 'people.id', '=', 'customers.people_id')
            ->select('people.*', 'customers.*')
            ->where('people.'.$column, 'LIKE', '%'.$term.'%')
            ->take(5)
            ->get();
        $result = array();
        foreach ($query as $key => $value)
        {
            $result[] = [
                'value' =>''.$value->$column,
                'id'        =>  $value->id,
                'ci'        =>  $value->ci,
                'name'      =>  $value->name,
                'lastname'  =>  $value->lastName,
                'birthday'  =>  $value->birthday,
                'phone'     =>  $value->phone,
                'address'   =>  $value->address,
                ];
        }
        return $result;
    }

}
