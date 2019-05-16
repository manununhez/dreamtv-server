<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserTaskError;
use App\UserTask;
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
            'task_id' => 'required|integer',
            'reason_code' => 'required|string',
            'subtitle_position' => 'required|integer'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        #We obtain user_task ID
        $userTaskId = $this->obtainUserTaskId($input['task_id']);
        #insert new values
        $userTaskError = $this->insertValuesFromJsonString($input, $userTaskId);

	//return $userTaskError;

        if(!$userTaskError)
            return $this->sendError('UserTaskError could not be created');
        else
            return $this->sendResponse($userTaskError, 'UserTaskError created successfully.');
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
    public function update(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'reason_code' => 'required|string',
            'subtitle_position' => 'required|integer'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        #We obtain user_task ID
        $userTaskId = $this->obtainUserTaskId($input['task_id']);

        # Delete old values
        $deleted = UserTaskError::where('user_tasks_id', $userTaskId)
                                        ->where('subtitle_position', $input['subtitle_position'])
                                        ->delete();

         if (!$deleted) {
            return $this->sendError('UserTaskError for task_id = '.$input['task_id'].' could not be updated/deleted.');
        }


        #insert new values
        $userTaskError = $this->insertValuesFromJsonString($input, $userTaskId);


        if(!$userTaskError)
            return $this->sendError('UserTaskError could not be created');
        else
            return $this->sendResponse($userTaskError, 'UserTaskError updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'subtitle_position' => 'required|integer'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        #We obtain user_task ID
        $userTaskId = $this->obtainUserTaskId($input['task_id']);

        # Delete old values
        // $deleted = UserTaskError::where('user_tasks_id', $userTaskId)
        //                                 ->where('subtitle_position', $input['subtitle_position'])
        //                                 ->delete();

        $userTaskError = UserTaskError::where('user_tasks_id', $userTaskId)
                                        ->where('subtitle_position', $input['subtitle_position'])
                                        ->get();

        $deleted = $userTaskError->delete();

        if($deleted)
            return $this->sendResponse($userTaskError->toArray(), 'UserTaskError with task_id = '.$input['task_id'].' and subtitle_position = '.$input['subtitle_position'].' deleted successfully.');
        else
            return $this->sendError('UserTaskError could not be deleted');
    }



    /**
    *
    *   Get userTask ID
    */
    private function obtainUserTaskId($taskId)
    {
        # We obtain the user_tasks_id
        $userId = auth()->user()->id;

        $userTask = UserTask::where('task_id', $taskId)
                            ->where('user_id', $userId)
                            ->first();


        if(is_null($userTask))
            return $this->sendError('UserTask with task_id = '.$input['task_id'].' not found.');


        return $userTask->id;
    }


    /**
    *
    *   Decode JSON String of reason_code values and insert them in UserTaskError
    */
    private function insertValuesFromJsonString($input, $userTaskId)
    {    

        #Decoding the reason_code jsonString parameter. Array of reason_Codes
        $errorsArray = json_decode($input['reason_code'], true);

        // $input['reason_code'] -> JSON string
        // '[{"name":"rc1","reason_code":"rc1"},{"name":"rc4","reason_code":"rc4"},{"name":"rc3","reason_code":"rc2"}]';

        
        #Create array of values to insert
        foreach ((array)$errorsArray as $key => $value) {
            $multipleValuesToInsert[] = array(
                                            "user_tasks_id" => $userTaskId,
                                            "reason_code" => $value["reason_code"],
                                            "subtitle_position" => $input['subtitle_position'],
                                            "comment" => isset($input['comment']) ? $input['comment'] : null
                                        );
        }

        #insert multiple values
        $userTaskError = UserTaskError::insert($multipleValuesToInsert);

        return $userTaskError;
    }
}
