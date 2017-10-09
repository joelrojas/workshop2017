<?php

namespace App\Http\Controllers;

use App\People;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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
        $people=new People;
        $people->ci           =   $request->ci;
        $people->name         =   $request->name;
        $people->lastName     =   $request->lastName;
        $people->birthday     =   $request->birthday;
        $people->phone        =   $request->phone;
        $people->sex          =   $request->sex;
        $people->address      =   $request->address;
        $people->save();

        $model = People::all()->last();
        $user = new User();
        $user->userType     =   $request->userType;
        $user->email        =   $request->email;
        $user->username     =   $request->username;
        $user->password     =   bcrypt($request->password);
        $user->people_id    =   $model->id;
        $user->save();
        return response()->json($people);
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
