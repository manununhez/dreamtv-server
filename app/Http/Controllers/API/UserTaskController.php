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
     * Parameters => task_id (mandatory, text), subtitle_version (mandatory, text), subtitle_position (mandatory, text)
     * Requires user token - header 'Authorization'
     */
     public function store(Request $request)
    {

        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'subtitle_version' => 'required|string',
            'subtitle_position' => 'required|integer',
            'time_watched' => 'integer',
            'comments' => 'nullable|string',
            'completed' => 'boolean',
            'rating' => 'integer'
            ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['user_id'] = auth()->user()->id;
        $userTask = UserTask::create($input);

        if(is_null($userTask))
            return $this->sendError('User tasks could not be created.');
        else
            return $this->sendResponse($userTask->toArray(), 'User Tasks created successfully.');

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
            return $this->sendError('UserTask not found.');
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
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'subtitle_version' => 'required|string',
            'subtitle_position' => 'required|integer',
            'time_watched' => 'required|integer',
    		'comments' => 'nullable|string',
    		'completed' => 'boolean',
    		'rating' => 'integer'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }

        $userTask = UserTask::where('task_id', $input['task_id'])
                            ->where('user_id', auth()->user()->id)
                            ->where('subtitle_version', $input['subtitle_version'])
                            ->where('subtitle_position', $input['subtitle_position'])
                            ->first();
	
    	if(is_null($userTask))
    		return $this->sendError('UserTask not found.');

        if(isset($input['comments']))
		  $userTask->comments = $input['comments'];
        
    	if(isset($input['completed']))
    		$userTask->completed = $input['completed'];
        
    	if(isset($input['rating']))
    		$userTask->rating = $input['rating'];
        
        $userTask->time_watched = $input['time_watched'];
        $updated = $userTask->save();

        if($updated)
            return $this->sendResponse($userTask->toArray(), 'User Task updated successfully.');
        else
            return $this->sendError('UserTask could not be created');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userTask = UserTask::find($id);

    	if(!$userTask)
    		return $this->sendError('User task with id = '.$id.' not found.');


    	$deleted = $userTask->delete();

    	if($deleted)
    		return $this->sendResponse($userTask->toArray(), 'UserTask deleted successfully.');
    	else
    		return $this->sendError('UserTask could not be deleted');
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
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = auth()->user();
   
        $userTask = UserTask::with('user_task_errors')
                    ->where('user_id', $user->id)
                    ->where('task_id', $input['task_id'])
                    ->orderBy('subtitle_position', 'ASC')
                    ->get();

        return $this->sendResponse($userTask->toArray(), "User task description.");
    }



}
