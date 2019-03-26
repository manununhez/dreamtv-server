<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserTasksError;
use Validator;


/**
 * @group User tasks
 *
 * APIs for retrieving user tasks
 */
class UserTasksErrorController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTasksError = UserTasksError::all();

        return $this->sendResponse($userTasksError->toArray(), 'UserTasksError retrieved successfully.');
    }
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
            'reason_code' => 'required',
            ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['user_id'] = auth()->user()->id;
        $userTasksError = UserTasksError::create($input);


        return $this->sendResponse($userTasksError->toArray(), 'UserTasksError created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userTasksErrors = UserTasksError::find($id);


        if (is_null($userTasksErrors)) {
            return $this->sendError('UserTasksErrors not found.');
        }


        return $this->sendResponse($userVideos->toArray(), 'User Tasks Errors retrieved successfully.');
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
            'reason_code' => 'required',
            'video_watched_time' => 'required'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }

        $userTasksError = UserTasksError::where('task_id', $input['task_id'])
                                    ->where('user_id', auth()->user()->id)
                                    ->where('subtitle_version', $input['subtitle_version'])
                                    ->where('subtitle_position', $input['subtitle_position'])
                                    ->where('reason_code', $input['reason_code'])
                                    ->get();
        
        $userTasksError->comments = $input['comments'];
        $userTasksError->video_watched_time = $input['video_watched_time'];
        $userTasksError->save();


       return $this->sendResponse($userVideo->toArray(), 'UserVideo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
   
        $userTask = UserTasksError::where('user_id', $user->id)
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
