<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalog;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalog.index'); 
    }

    public function indexDataTable()
    {

        //$catalogList = Catalog::all()->forPage(1,3);
        $catalogList = Catalog::all()->take(3)->offset(3);

        return response()->json($catalogList);
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
        $data = [
            'name' => $request['name'],
            'description' => $request['description']
        ];

         //return Catalog::create($data);
        $catalog = Catalog::create($data);
        return response()->json($catalog);
        //return DB::table('catalogs')->insert($data);
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
        //$catalog = DB::table('catalogs')->where('id', $id)->first();
        $catalog = Catalog::find($id);
        return $catalog;
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
        ######################  QUERY BUILDER ###############
        /* $catalog = DB::table('catalogs')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'description' => $request['description']
            ]);*/
        $catalog = Catalog::find($id);
        $catalog->name = $request['name'];
        $catalog->description = $request['description'];
        $catalog->save();

        return $catalog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catalog::destroy($id);
    }
}
