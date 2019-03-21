<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Task;
use Validator;


class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();


        return $this->sendResponse($tasks->toArray(), 'Tasks retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required',
            'video_id' => 'required',
            'language' => 'required',
            'type' => 'required',
            'created' => 'required',
            'modified' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $task = Task::create($input);


        return $this->sendResponse($task->toArray(), 'Task created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($task_id)
    {
        $task = Task::find($task_id);


        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }


        return $this->sendResponse($task->toArray(), 'Task retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'video_id' => 'required',
            'language' => 'required',
            'type' => 'required',
            'created' => 'required',
            'modified' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $task->video_id =  $input['video_id'];
        $task->language =  $input['language'];
        $task->type =  $input['type'];
        $task->created =  $input['created'];
        $task->modified =  $input['modified'];
        $task->completed = isset($input['completed']) ? $input['completed'] : null;
        
        $task->save();


        return $this->sendResponse($task->toArray(), 'Task updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();


        return $this->sendResponse($task->toArray(), 'Task deleted successfully.');
    }
}