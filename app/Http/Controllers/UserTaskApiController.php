<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\UserTask;


/**
 * @resource UserTask
 *
 * Longer description
 */

class UserTaskApiController extends AppBaseController
{
    
  
    public function index(Request $request) 
    {
  
        $task_type = $request['type'];
        
        switch ($task_type) {
            case "user":
                //echo "getUserTasks!";
                return $this->getUserTasks($request);
                //break;
            case "others":
                //echo "getOtherUserTasks!";
                return $this->getOtherUserTasks($request);
                //break;
            default:
                //echo "getUserTasks!";
                return $this->getUserTasks($request);

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
    public function getUserTasks(Request $request) {
        
        $user = DB::table('userAccounts')
                ->select('userAccounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            $matchThese = ['task_id' => $request['task_id'], 'user_id' => $user->id];

            $userTask = UserTask::where($matchThese)
                        ->orderBy('subtitle_position', 'ASC')
                        ->get();

            return AppBaseController::sendResponse($userTask, "User task description.");
        }
        else
            return AppBaseController::sendError("User not found.");
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
    public function getOtherUserTasks(Request $request) {
        $user = DB::table('userAccounts')
                ->select('userAccounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            $userTask = UserTask::where('user_id', '!=', $user->id)
                        // ->orWhereNull('user_id')
                        ->where('task_id', $request['task_id'])
                        ->orderBy('subtitle_position', 'ASC')
                        ->groupBy('subtitle_position','id','user_id','task_id','subtitle_version',
                                'reason_id','comments','created_at','updated_at')
                        ->get();

            return AppBaseController::sendResponse($userTask, "Other users task description.");

        }
        else
            return AppBaseController::sendError("User not found.");

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

        $r = $request->all();

        $user = DB::table('userAccounts')
                    ->select('userAccounts.*')
                    ->where('token', '=' ,$request->header('Authorization'))
                    ->first(); 

        if($user !== null)
        {
            try{
                $userTask = new UserTask();
                $userTask->user_id = $user->id;
                $userTask->task_id = $r['task_id'];
                $userTask->subtitle_version = $r['subtitle_version'];
                $userTask->subtitle_position = $r['subtitle_position'];
                $userTask->reason_id = isset($r['reasonList']) ? $r['reasonList'] : null;
                $userTask->comments = isset($r['comments']) ? $r['comments'] : null;
                $userTask->save();
            
            return AppBaseController::sendResponse($userTask, "User task added correctly.");
            } catch(QueryException $e) {
                    return AppBaseController::sendError($e->getMessage());
            }

        }
        else
            return AppBaseController::sendError("User not found.");
    }

}
