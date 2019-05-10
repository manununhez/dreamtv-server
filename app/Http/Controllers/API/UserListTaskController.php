<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserListTask;
use App\Task;
use Validator;


class UserListTaskController extends BaseController
{
    /**
     * Get all videos from user list.
     *
     * Display a listing of the resource. 
     * Pagination mode : Displays 16 items per page
     *
     * QueryParams => 'page':<number_page>  integer
     * 
     * Requires user token - header 'Authorization'
     */
    public function index()
    {
        $userListTask = UserListTask::all();

        return $this->sendResponse($userListTask->toArray(), 'List of user tasks retrieved successfully.');
    }


    /**
     * Add video to user video list
     * Store a newly created resource in storage.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
            'sub_language_config' => 'required|string',
            'audio_language_config' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $input['user_id'] = auth()->user()->id;
        $userListTask = UserListTask::create($input);

        if(is_null($userListTask))
            return $this->sendError('Task could not be added to user list.');
        else
            return $this->sendResponse($userListTask->toArray(), 'Task added to user list successfully.');

    }


    /**
     * Display the specified resource.
     *
     * Show User Video Info
     *
     * Display the specified resource.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $userListTask = UserListTask::find($id);


        if (is_null($userListTask)) {
            return $this->sendError('User taks list not found.');
        }

        return $this->sendResponse($userListTask->toArray(), 'List of user tasks retrieved successfully.');
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
            'sub_language_config' => 'required|string',
            'audio_language_config' => 'required|string'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }

    	$userListTask = UserListTask::find($id);

        if (is_null($userListTask)) {
            return $this->sendError('User taks list not found.');
        }

    	$userListTask->task_id = $input['task_id'];
    	$userListTask->sub_language_config = $input['sub_language_config'];
    	$userListTask->audio_language_config = $input['audio_language_config'];
    	$updated = $userListTask->save();

        if($updated)
            return $this->sendResponse($userListTask->toArray(), 'Task from user list updated successfully.');
        else
            return $this->sendError('Task from user list could not be updated');

    }


    /**
     * Remove the specified resource from storage.
     * Remove Video from UserVideoList
     *
     * Parameters => video_id (text, mandatory)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$userListTask = UserListTask::find($id);

        if (is_null($userListTask)) {
            return $this->sendError('User taks list not found.');
        }
    	
        $deleted = $userListTask->delete();

        if($deleted)
            return $this->sendResponse($userListTask->toArray(), 'Task from user list deleted successfully.');
        else
            return $this->sendError('Task from user list could not be deleted');

    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteByTask(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'task_id' => 'required|integer',
        ]);

        $taskId = $input['task_id'];
    
        $userListTask = UserListTask::where("task_id", $taskId);

        if (is_null($userListTask)) {
            return $this->sendError('User taks list not found.');
        }

        $deleted = $userListTask->delete();

        if($deleted)
            return $this->sendResponse($userListTask->toArray(), 'Task from user list deleted successfully.');
        else
            return $this->sendError('Task from user list could not be deleted');
    }

}


