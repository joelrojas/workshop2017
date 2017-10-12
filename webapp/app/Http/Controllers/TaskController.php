<?php

namespace App\Http\Controllers;

use App\Task;
use App\Users_task;
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
        $role = "incompleto";
        $task=new Users_task;
        $task->date = $request->date;
        $task->state = $role;
        $task->dateEnd = $request->dateEnd;
        $task->dateBegin = $request->dateBegin;
        $task->users_id =$request->users_id;
        $task->tasks_id =$request->tasks_id;
        $task->save();
        return response()->json($task);

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
        $idtask    = $request->input('idtask');

        $date      = $request->input('date');
        $state   = $request->input('state');
        $dateEnd       = $request->input('dateEnd');
        $dateBegin   = $request->input('dateBegin');
        $tasks_id = $request->input('multiple');
        $users_id = $request->input('empleado');

        $tasks = DB::table('users_tasks')
            ->where('id', $idtask)
            ->update([
                'date' => $date,
                'state'=> $state,
                'dateEnd'=>$dateEnd,
                'dateBegin'=>$dateBegin,
                'tasks_id'=>$tasks_id,
                'users_id'=>$users_id
            ]);
        if($tasks){
            return response()->json(['x'=> 'se regssitro users y people' ]);
        }
        else{
            return response()->json(['x'=> 'no se registro people' ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('users_tasks')->where('id', '=', $request->idtask)->delete();
    }

    public function autocompleteEmpleado(Request $request)
    {
        $term = $request->term;
        $data = DB::table('people')
            ->join('users', 'people.id', '=', 'users.people_id')
            ->select('people.*', 'users.*')
            ->where('people.name', 'LIKE', '%'.$term.'%')
            //->orWhere('people.lastName','LIKE','%'.$term.'%')
            // ->orWhere('people.ci','LIKE','%'.$term.'%')
            ->take(5)
            ->get();
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[] = ['value' =>'Cliente : '.$value->lastName.' '.$value->name.' | NITCI: '.$value->ci,  'id'=>$value->id];
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
