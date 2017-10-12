<?php

namespace App\Http\Controllers;

use App\People;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function update(Request $request)
    {

        $ci      = $request->input('ci');
        $name   = $request->input('email');
        $lastName       = $request->input('username');
        $birthday   = $request->input('password');
        $phone    = $request->input('people_id');
        $sex    =   $request->input('sex');
        $address    =   $request->input('address');

        $userType      = $request->input('userType');
        $email   = $request->input('email');
        $username       = $request->input('username');
        $password   = $request->input('password');
        $people_id    = $request->input('idpeople');


        /*$users = Users::find($request->people_id);
        $users->userType       = $request->userType;
        $users->email  = $request->last_name;
        $users->username      = $request->phone;
        $users->password        = $request->sex;
        $users->save();
        return response()->json($users);*/

        $updateUsers = DB::table('users')
            ->where('people_id', $people_id)
            ->update(['userType' => $userType,
                'email'=> $email,
                 'username'=>$username,
                'password'=>$password]);
        if($updateUsers){
            $updatePeople = DB::table('people')
                ->where('id', $request->id)
                ->update([
                    'ci' => $ci,
                    'name'=> $name,
                    'lastName'=>$lastName,
                    'birthday'=>$birthday,
                    'phone'=>$phone,
                    'sex'=>$sex,
                    'address'=>$address]);
            if($updatePeople){
                return response()->json(['x'=> 'registro editado' ]);
            }
            else{
                return response()->json(['x'=> 'no se actualizo personas' ]);
            }
        }
        else{
            return response()->json(['x'=> 'no se regssitro users' ]);
        }



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
