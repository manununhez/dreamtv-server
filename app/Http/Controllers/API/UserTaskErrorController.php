<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserTaskError;
use Validator;


/**
 * @group User task errors
 *
 * APIs for retrieving user task errors
 */
class UserTaskErrorController extends BaseController
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTaskErrors = UserTaskError::all();

        return $this->sendResponse($userTaskErrors->toArray(), 'UserTaskError retrieved successfully.');
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
            'user_tasks_id' => 'required|integer',
            'reason_code' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $userTaskError = UserTaskError::create($input);

        if(is_null($userTaskError))
            return $this->sendError('UserTaskError could not be created');
        else
            return $this->sendResponse($userTaskError->toArray(), 'UserTaskError created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userTaskError = UserTaskError::find($id);


        if (!$userTaskError) {
            return $this->sendError('UserTaskError with id = '.$id.' not found.');
        }


        return $this->sendResponse($userTaskError->toArray(), 'UserTaskError with id = '.$id.' retrieved successfully.');
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
            'user_tasks_id' => 'required|integer'
            'reason_code' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
    
        $userTaskError = UserTaskError::find($id);

         if (!$userTaskError) {
            return $this->sendError('UserTaskError with id = '.$id.' not found.');
        }
        
        $userTaskError->user_tasks_id =  $input['user_tasks_id'];
        $userTaskError->reason_code =  $input['reason_code'];
        $updated = $userTaskError->save();

        if($updated)
            return $this->sendResponse($userTaskError->toArray(), 'UserTaskError updated successfully.');
        else
            return $this->sendError('UserTaskError could not be updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userTaskError = UserTaskError::find($id);

         if (!$userTaskError) {
            return $this->sendError('UserTaskError with id = '.$id.' not found.');
        }

        $deleted = $userTaskError->delete();

        if($deleted)
            return $this->sendResponse($userTaskError->toArray(), 'UserTaskError deleted successfully.');
        else
            return $this->sendError('UserTaskError could not be deleted');
    }



        /**
     * List of user tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function userTasksErrorsByUserType(Request $request) 
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'type' => 'required|string',
            'task_id' => 'required|integer'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $task_type = $input['type'];
        
        switch ($task_type) {
            case "current_user":
                return $this->getTaskDetailsForCurrentUser($request);
            
            case "other_users":
                return $this->getTaskDetailsForOtherUsers($request);
            
            default:
                return $this->getTaskDetailsForCurrentUser($request);
        }
    }


    /**
    * Get user task
    *
    * Retrieves current user specific data about task (task_id).
    * Order by subtitle_position ASC
    * QueryParams => 'task_id':<task_id>  integer 
    * Requires user token - header 'Authorization'
    */
    public function getTaskDetailsForCurrentUser(Request $request)
    {
        $user = auth()->user();
   
        $userTask = UserTask::where('user_id', $user->id)
                    ->where('task_id', $request['task_id'])
                    ->orderBy('subtitle_position', 'ASC')
                    ->get();

        return $this->sendResponse($userTask->toArray(), "User task description.");
       
    }


    /**
    * Get Other User Tasks
    * 
    * Retrieves all users data about task (task_id)
    * excluding current user tasks. This option warns current user about
    * other user choices in the same task. 
    * 
    * Order by subtitle_position ASC
    * QueryParams => 'task_id':<task_id>  integer 
    * Requires user token - header 'Authorization'
    */
    public function getTaskDetailsForOtherUsers(Request $request) 
    {
        $user = auth()->user();
        
        $userTask = UserTask::where('user_id', '!=', $user->id)
                    ->where('task_id', $request['task_id'])
                    ->orderBy('subtitle_position', 'ASC')
                    ->get();

        return $this->sendResponse($userTask->toArray(), "Other users task description.");
    }

}
