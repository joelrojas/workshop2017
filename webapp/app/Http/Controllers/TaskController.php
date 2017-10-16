<?php

namespace App\Http\Controllers;

use App\Task;
use App\Users_task;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        $arrStart = explode("/", Input::get('startDate'));
        $arrEnd = explode("/", Input::get('endDate'));
        $startDate = Carbon::create($arrStart[2], $arrStart[0], $arrStart[1], 0, 0, 0);
        $endDate = Carbon::create($arrEnd[2], $arrEnd[0], $arrEnd[1], 23, 59, 59);

        //$catalogList = Catalog::all()->forPage(1,3);
        $tasksList = Task::table('users_tasks')
            ->join('tasks','users_tasks.tasks_id','=','tasks.id')
            ->join('users','users.id','=','users_tasks.users_id')
            ->join('people','users.people_id','=','people.id')
            ->whereBetween('users_tasks.dateBegin',[$startDate,$endDate])
            ->addColumn( 'action', function ( $orders )
            {
                return '<a href="/taskAsignment/' . $orders->id . '" class="btn btn-xs btn-primary"><i class="fa fa-truck"></i></a>';
            }
            )
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
    //Funcion para descargar el archivo PDF
    public function downloadPDF(){
        $user = Users_task::all();

        $pdf = PDF::loadView('PDF.report', compact('user'));
        return $pdf->download('invoice.pdf');

    }
}
