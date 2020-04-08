<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{	


	public function show(Request $request)
	{	


		$tasks = Task::where('emp_id' , $request->user()->id)->paginate(5);

        if($request->ajax())
        {
            return view('tasks' ,['tasks' => $tasks]);
        }

		return view('employeeTasks' ,['tasks' => $tasks]);
	}



    public function create()
    {	


    	$employees =  User::where('role' ,'employee')->get();

    	return view('createTask' ,['employees' => $employees]);
    }


    public function store(Request $request)
    {
    	

    	$validatedData = $request->validate([
            'name' => 'required',
            'emp_id' => 'required',
        ]);

    	$task = new Task($validatedData);

    	$task->save();

    	return back()->with('status' ,'Task created');
    }



    public function edit(Task $task)
    {	

    	return view('assignTask' ,['task' => $task]);
    }


    public function update(Request $request ,Task $task)
    {


    	$validatedData = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        if($request->start_time > $request->end_time)
        {
            return back()->with('timeUpdate' ,'Erro Start time is bigger than end time');
        }

    	$task->start_time = $request->start_time;

    	$task->end_time = $request->end_time;

    	$task->save();

    	return back()
    		->with('timeUpdate' ,'Task start and end time updated succesfully');
    }	


}
