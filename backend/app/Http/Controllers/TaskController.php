<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    
    public function index()
    {
        return response(Task::with('category')->get()->jsonSerialize(),Response::HTTP_OK);
    }

    public function tasksFiltered(Request $request)
    {
        $status=$request->status ? $request->status : null;
        Log::info($status);
        $tasks=Task::when($status,function(Builder $query) use($status){
            return $query->whereStatus($status);
        })->with('category')->get();
        return response($tasks->jsonSerialize(),Response::HTTP_OK);
    }

    public function show(Task $task)
    {
        return response($task->jsonSerialize(),Response::HTTP_OK);
    }
   
    public function store(Request $request)
    {
        $task=new Task();
        $task->title=$request->title;
        $task->category_id=$request->category_id;
        $task->save();
        return response($task->jsonSerialize(),Response::HTTP_CREATED);

    }

    public function update(Request $request,$id)
    {
        $task=Task::find($id);
        $task->title=$request->title;
        $task->category_id=$request->category_id;
        $task->status=$request->status;
        $task->isCompleted=$request->isCompleted;
        $task->update();
        return response($task->jsonSerialize(),Response::HTTP_OK);
    }


    public function destroy(Task $task)
    {
        if($task->delete()){
            return response(null,Response::HTTP_OK);
        }
    }
}
