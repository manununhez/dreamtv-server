<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserTask;
use Validator;


/**
 * @group User tasks
 *
 * APIs for retrieving user tasks
 */
class UserTaskController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTasks = UserTask::all();

        return $this->sendResponse($userTasks->toArray(), 'UserTask retrieved successfully.');
    
    }

     /**
     * Save User task
     * Store a newly created resource in storage.
     *
     * Parameters => task_id (mandatory, text), subtitle_version (mandatory, text)
     * Requires user token - header 'Authorization'
     */
     public function store(Request $request)
    {

        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'subtitle_version' => 'required|string'
            ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $input['user_id'] = auth()->user()->id;
        $userTask = UserTask::create($input);

        if(is_null($userTask)){
            return $this->sendError('User tasks could not be created.', 500);
        }
        else
        {
            $userTask = $this->getUserTaskWithErrors($input['task_id']);
            return $this->sendResponse($userTask->toArray(), 'User Tasks created successfully.');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userTask = UserTask::find($id);


        if (is_null($userTask)) {
            return $this->sendError('UserTask not found.', 400);
        }


        return $this->sendResponse($userTask->toArray(), 'User Task retrieved successfully.');
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
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'subtitle_version' => 'required|string'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors(), 400);       
         }

        $userTask = UserTask::where('task_id', $input['task_id'])
                            ->where('user_id', auth()->user()->id)
                            ->where('subtitle_version', $input['subtitle_version'])
                            ->first();
	
    	if(is_null($userTask))
    		return $this->sendError('UserTask not found.', 400);

        if(isset($input['time_watched']))
		  $userTask->time_watched = $input['time_watched'];
        
    	if(isset($input['completed']))
    		$userTask->completed = $input['completed'];
        
    	if(isset($input['rating']))
    		$userTask->rating = $input['rating'];
        
        $updated = $userTask->save();

        if($updated){
            $userTask = $this->getUserTaskWithErrors($input['task_id']);
            return $this->sendResponse($userTask->toArray(), 'User Task updated successfully.');
        }
        else{
            return $this->sendError('UserTask could not be created', 500);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $userTask = UserTask::find($id);

    	if(!$userTask)
    		return $this->sendError('User task with id = '.$id.' not found.', 400);


    	$deleted = $userTask->delete();

    	if($deleted)
    		return $this->sendResponse($userTask->toArray(), 'UserTask deleted successfully.');
    	else
    		return $this->sendError('UserTask could not be deleted', 500);
    }



        /**
     * List of user tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function userTasksErrorsDetails(Request $request) 
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $userTask = $this->getUserTaskWithErrors($input['task_id']);

        // if (is_null($userTask)) { //In case is null, we dont send error, instead just send the null value
        //     return $this->sendError('UserTask not found.', 400);
        // } else {
            return $this->sendResponse($userTask, "User task description.");
        // }
    }


    private function getUserTaskWithErrors($taskId){
        $userId = auth()->user()->id;
   
        $userTask = UserTask::with('userTaskErrors')
                    ->where('user_id', $userId)
                    ->where('task_id', $taskId)
                    ->first();


        return $userTask;
    }

}
