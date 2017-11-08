<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function searchProduct(Request $request)
    {
        $term   = $request->term;
        $column = 'name';
        $result = $this->lookForProduct($column, $term);
        return response()->json($result);
    }

    public function lookForProduct($column,$term)
    {
        $query = DB::table('products')
            ->select('products.*')
            ->where('products.'.$column, 'LIKE', '%'.$term.'%')
            ->take(10)
            ->get();
        $result = array();
        foreach ($query as $key => $value) {
            $result[] = [
                'value' => '' . $value->$column,
                'id' => $value->id,
                'name' => $value->name,
                'price' => $value->price,
                'quantity' => $value->quantity
            ];
        }
        return $result;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
