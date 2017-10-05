<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customerHistory(Request $request)
    {
        $idCustomer = $request->input('id-customer');

        $search = Customer::find($idCustomer);

        if(!empty($search)) {
            $result = 1;
        }
        else {
            $result = 0;
            $search = '';
        }
        return response()->json(['x'=> $result,'search'=>$search ]);
    }

    public function autocompleCustomerByPhone(Request $request)
    {
        $term = $request->term;

        $data = DB::table('people')
            ->join('customers', 'people.id', '=', 'customers.people_id')
            ->select('people.*', 'customers.*')
            ->where('people.phone', 'LIKE', '%'.$term.'%')
            ->take(5)
            ->get();

        $result = array();
        foreach ($data as $key => $value)
        {
            $result[] = ['value' =>''.$value->phone, 'id'=>$value->id, 'name' => $value->name, 'lastname'=>$value->lastName, 'birthday'=>$value->birthday, 'address'=> $value->address];
        }
        return response()->json($result);
    }

}
