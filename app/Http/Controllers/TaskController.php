<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\AmaraAPI;
Use App\Models\Task;
use App\Models\Video;
Use App\Models\User;
use App\Models\VideoTest;
use App\Models\UserTasksError;  

/**
 * @group Tasks
 *
 * APIs for retrieving tasks
 */
class TaskController extends AppBaseController
{

    /**
     * List of tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function index(Request $request)
    {
        $task_type = $request['type'];
        
        switch ($task_type) {
            case "all":
                //echo "getAllTasks!";
                return $this->getAllTasks($request);
                //break;
            case "continue":
                //echo "getContinueTasks!";
                return $this->getContinueTasks($request);
                //break;
            case "finished":
                //getAlreadyDoneTasks();
                break;
            case "test":
                //echo "getTestTasks!";
                return $this->getTestTasks($request);
                //break;
            default:
                //echo "getAllTasks!";
                return $this->getAllTasks($request);

        }
    }


   
    /**
     * Retrieve all tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getAllTasks(Request $request)
    {
    // ORDER BY SELECT STR_TO_DATE('2015-03-27T04:40:01Z','%Y-%m-%dT%TZ');
        $user = UserAccount::select('userAccounts.*') //DB::table('userAccounts')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();
        
        if($user !== null)
        {
            $sub_language = ($user->sub_language !== null && $user->sub_language != "NN")  ? $user->sub_language : null;
            $audio_language = ($user->audio_language !== null && $user->audio_language != "NN")  ? $user->audio_language : null;

            $userTasks = UserTask::where('userTasks.user_id', '=', $user->id)
                                ->groupBy('userTasks.task_id')
                                ->pluck('userTasks.task_id')
                                ->all();
                            // DB::table('userTasks')
            if(($sub_language !== null) && ($audio_language !== null)) {

                //We only shows tasks not finished yet by the user
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id') //DB::table('tasks')
                            ->select('tasks.*', 'videos.*')
                            ->whereNotIn('tasks.task_id', $userTasks)
                            // ->where(function ($query) {
                            //     $query->where('tasks.type', 'Review')
                            //           ->orWhere('tasks.type', 'Approve');
                            //     })
                            ->where('tasks.type', 'Review')
                            ->where('tasks.language','=', $sub_language)
                            ->where('videos.primary_audio_language_code','=', $audio_language)
                            // ->where('videos.project','=','tedtalks') //--------------><
                            ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                            ->paginate(16);
            
            } elseif($sub_language !== null) {
                                
                //We only shows tasks not finished yet by the user
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id') //DB::table('tasks')
                            ->select('tasks.*', 'videos.*')
                            ->whereNotIn('tasks.task_id', $userTasks)
                            // ->where('videos.project','=','tedtalks') //--------------><
                            // ->where(function ($query) {
                            //     $query->where('tasks.type', 'Review')
                            //           ->orWhere('tasks.type', 'Approve');
                            //     })
                            ->where('tasks.type', 'Review')
                            ->where('tasks.language','=', $sub_language)
                            ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                            ->paginate(16);
            } elseif($audio_language !== null) {

                //We only shows tasks not finished yet by the user
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id') //DB::table('tasks')
                            ->select('tasks.*', 'videos.*')
                            ->whereNotIn('tasks.task_id', $userTasks)
                            // ->where('videos.project','=','tedtalks') //--------------><
                            // ->where(function ($query) {
                            //     $query->where('tasks.type', 'Review')
                            //           ->orWhere('tasks.type', 'Approve');
                            //     })
                            ->where('tasks.type', 'Review')
                            ->where('videos.primary_audio_language_code','=', $audio_language)
                            ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                            ->paginate(16);
            } else {

                //We only shows tasks not finished yet by the user
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id') //DB::table('tasks')
                            ->select('tasks.*', 'videos.*')
                            ->whereNotIn('tasks.task_id', $userTasks)
                            // ->where(function ($query) {
                            //     $query->where('tasks.type', 'Review')
                            //           ->orWhere('tasks.type', 'Approve');
                            //     })
                            // ->where('videos.project','=','tedtalks') //--------------><
                            ->where('tasks.type', 'Review')
                            ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                            ->paginate(16);
            }
            
            return AppBaseController::sendResponse($tasks, "");
            //return $tasks;
            
        }
        else
            return AppBaseController::sendError("User not found.");

    }

    
    /**
     * Retrieve all tasks to continue
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getContinueTasks(Request $request)
    {
    // ORDER BY SELECT STR_TO_DATE('2015-03-27T04:40:01Z','%Y-%m-%dT%TZ');
        $user = UserAccount::select('userAccounts.*') //DB::table('userAccounts')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();
        
        if($user !== null)
        {
            // $sub_language = ($user->sub_language !== null && $user->sub_language != "NN")  ? $user->sub_language : null;
            // $audio_language = ($user->audio_language !== null && $user->audio_language != "NN")  ? $user->audio_language : null;

            //Traer la lista solo con los idiomas correspondientes????

            //We get all the videos already seen by the user
            $userTasks = UserTask::where('userTasks.user_id', '=', $user->id) //DB::table('userTasks')
                                ->groupBy('userTasks.task_id')
                                ->pluck('userTasks.task_id')
                                ->all();

            $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                        ->select('tasks.*', 'videos.*')
                        ->whereIn('tasks.task_id', $userTasks)
                        // ->where('videos.project','=','tedtalks') //--------------><
                        // ->where(function ($query) {
                        //     $query->where('tasks.type', 'Review')
                        //           ->orWhere('tasks.type', 'Approve');
                        //     })
                        ->where('tasks.type', 'Review')
                        ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(50);
            
            return AppBaseController::sendResponse($tasks, "");
            //return $tasks;
        }
        else
            return AppBaseController::sendError("User not found.");
    }

    
    
    /**
     * Retrieve all test tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getTestTasks(Request $request)
    {
        $videoIdArray = VideoTests::select('video_id')->pluck('video_id');
        
        $user = UserAccount::select('userAccounts.*') //DB::table('userAccounts')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        
        if($user !== null)
        {
            $sub_language = ($user->sub_language !== null && $user->sub_language != "NN")  ? $user->sub_language : null;
            $audio_language = ($user->audio_language !== null && $user->audio_language != "NN")  ? $user->audio_language : null;

            if(($sub_language !== null) && ($audio_language !== null)) {
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                        ->select('tasks.*', 'videos.*')
                        ->where('tasks.language','=', $sub_language)
                        ->where('videos.primary_audio_language_code','=', $audio_language)
                        // ->where('tasks.type', $Translate)
                        ->whereIn('videos.video_id', $videoIdArray)
                        ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(50);

              
            } elseif($audio_language !== null) {
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                        ->select('tasks.*', 'videos.*')
                        ->where('videos.primary_audio_language_code','=', $audio_language)
                        // ->where('tasks.type', $Translate)
                        ->whereIn('videos.video_id', $videoIdArray)                
                        ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(50);

            } elseif($sub_language !== null) {
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                        ->select('tasks.*', 'videos.*')
                        ->where('tasks.language','=', $sub_language)
                        // ->where('tasks.type', $Translate)
                        ->whereIn('videos.video_id', $videoIdArray)
                        ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(50);
           
            }else{
                $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                        ->select('tasks.*', 'videos.*')
                        // ->where('tasks.type', $Translate)
                        ->whereIn('videos.video_id', $videoIdArray)
                        ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(50);

            }
            
            return AppBaseController::sendResponse($tasks, "");
            //return $tasks;
        }
        else
            return AppBaseController::sendError("User not found.");
    }

}
