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
            'task_id' => 'required',
            'subtitle_version' => 'required',
            'subtitle_position' => 'required',
            ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['user_id'] = auth()->user()->id;
        $userTask = UserTask::create($input);


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
            'task_id' => 'required',
            'subtitle_version' => 'required',
            'subtitle_position' => 'required',
            'time_watched' => 'required'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }

        $userTask = UserTask::where('task_id', $input['task_id'])
                            ->where('user_id', auth()->user()->id)
                            ->where('subtitle_version', $input['subtitle_version'])
                            ->where('subtitle_position', $input['subtitle_position'])
                            ->get();
        
        $userTask->comments = $input['comments'];
        $userTask->completed = $input['completed'];
        $userTask->rating = $input['rating'];
        $userTask->time_watched = $input['time_watched'];
        $userTask->save();


       return $this->sendResponse($userTask->toArray(), 'User Task updated successfully.');
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
    public function userTasksErrorsByUserType(Request $request) 
    {

        $task_type = $request['type'];
        
        switch ($task_type) {
            case "current_user":
                //echo "getUserTasks!";
                return $this->getTaskDetailsForCurrentUser($request);
                //break;
            case "other_users":
                //echo "getOtherUserTasks!";
                return $this->getTaskDetailsForOtherUsers($request);
                //break;
            default:
                //echo "getUserTasks!";
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
