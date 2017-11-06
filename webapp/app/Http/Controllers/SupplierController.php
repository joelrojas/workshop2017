<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('supplier.index');
    }

public function listSupplier()
{
    $supplier = Supplier::all();

    return response()->json($supplier);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*
        $supplier=new Supplier;
        $supplier->companyName = $request->companyName;
        $supplier->contactName = $request->contactName;
        $supplier->address = $request->address;
        $supplier->productSupplied = $request->productSupplied;
        $supplier->phono =$request->phono;
        $supplier->save();
        return response()->json($supplier);
        */
        //$dato="FUNCIONA";
        //echo '<script type="text/javascript">alert("'.$dato.'");</script>';
        $supplier_id=DB::table('suppliers')->insertGetId([
            'companyName'     =>$request->companyName,
            'contactName'     =>$request->contactName,
            'address'         =>$request->address,
            'phono'           =>$request->phono,
            'productSupplied' => "hola2"
        ]);
        $auxi=array();
        $auxi=json_decode($request->productSupplied);
        $var=0;
        /*for($i=1;$auxi.length;$i++)
        {
            $var=$auxi[$i];
        }
        */

        foreach ($auxi as $valor) {
        $product_id=DB::table('products')->insertGetId([
                'name'       =>$valor->name,
                'price'      =>0,
                'quantity'   =>0,
                'productType'=>"Alcoholica",
            ]);
        DB::table('suppliers_products')->insert([
           'products_id' => $product_id,
           'suppliers_id'=> $supplier_id
        ]);
        }



    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //


             DB::table('suppliers')
            ->where('id', $request->id)
            ->update(['companyName' => $request->companyName,
                'contactName'=> $request->contactName,
                'productSupplied'=>$request->productSupplied,
                'address'=>$request->address,
                'phono'=>$request->phono]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        DB::table('suppliers')->where('id', '=', $request->id)->delete();
    }
}
