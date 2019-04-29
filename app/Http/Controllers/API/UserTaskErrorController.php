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
            'user_tasks_id' => 'required|integer',
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
   
        $userTask = UserTask::where('user_id', $user->id)
                    ->where('task_id', $input['task_id'])
                    ->orderBy('subtitle_position', 'ASC')
                    ->get();

        return $this->sendResponse($userTask->toArray(), "User task description.");
    }



}
