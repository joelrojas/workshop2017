<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('task.index');
    }
    public function indexDataTable()
    {

        //$catalogList = Catalog::all()->forPage(1,3);
        $tasksList = Task::table('users_tasks')
            ->join('tasks','users_tasks.tasks_id','=','tasks.id')
            ->join('users','users.id','=','users_tasks.users_id')
            ->join('people','users.people_id','=','people.id')
            ->orderBy('tasks.id','asc')->take(3)->offset(3);

        return response()->json($tasksList);
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
        $users_tasks=new users_tasks();
        $users_tasks->name        = $request->name;
        $users_tasks->lastName    = $request->lastName;
        $users_tasks->task_id       = $request->task_id;
        $users_tasks->user_id         = $request->user_id;
        $users_tasks->dateBegin = $request->dateBegin;
        $users_tasks->dateEnd         = $request->dateEnd;
        $users_tasks->save();

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

    public function autocompleteEmpleado(Request $request)
    {
        $term = $request->term;
        $data = DB::table('users')
            ->join('people', 'users.people_id', '=', 'people.id')
            ->where('people.name','LIKE','%'.$term.'%')
            ->orWhere('people.lastName','LIKE','%'.$term.'%')
            ->orWhere('people.ci','LIKE','%'.$term.'%')
            ->take(5)
            ->get();
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[] = ['value' =>'Cliente : '.$value->lastName.' '.$value->name.' | NITCI: '.$value->ci];
        }
        return response()->json($result);
    }
    /**
     * Buscar y autocompletar el nombre del empleado
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
