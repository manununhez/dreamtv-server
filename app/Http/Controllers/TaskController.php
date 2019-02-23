<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use App\AmaraAPI;
Use App\Models\Task;
use App\Models\Video;
Use App\Models\UserAccount;
use App\VideoTests;
use App\Models\UserTask;  

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



    /**
     * Save test tasks from Amara
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function saveTestTasksFromAmara(Request $request)
    {
        $API = new AmaraAPI();
        $tasks = array();
        $offset = 0;
        $limit = 40;

        $Translate = 'Translate';
        $Review = 'Review';
        $Approve = 'Approve';

        $videoIdArray = VideoTests::select('video_id')->pluck('video_id');

        foreach ($videoIdArray as $videoId){
            
            $offset = 0;
            $limit = 40;
                
            do{
                $resultChunk = $API->getTasks(array(
                        'team' => 'ted',
                        'order_by'=> '-modified',
                        'video_id'=>$videoId,
                        'language'=>'pl',
                        //'assignee'=>'ted_Snai',
                        'type' => $Translate,
                        'limit'=> $limit,
                        'offset'=>$offset,
                        ));


                $tasks = $resultChunk->objects;

                if($tasks === null) {
                    $resultChunk = $API->getTasks(array(
                        'team' => 'ted',
                        'order_by'=> '-modified',
                        'video_id'=>$videoId,
                        'language'=>'pl',
                        //'assignee'=>'ted_Snai',
                        'type' => $Review,
                        'limit'=> $limit,
                        'offset'=>$offset,
                        ));

                    $tasks = $resultChunk->objects;

                    if($tasks === null) {
                        $resultChunk = $API->getTasks(array(
                            'team' => 'ted',
                            'order_by'=> '-modified',
                            'video_id'=>$videoId,
                            'language'=>'pl',
                            //'assignee'=>'ted_Snai',
                            'type' => $Approve,
                            'limit'=> $limit,
                            'offset'=>$offset,
                            ));

                        $tasks = $resultChunk->objects;

                    }
                }


                $offset += $limit;

                // if(isset($resultChunk->objects)) {

                foreach ($tasks as $key => $value){
                    $objectTask = new Task();
                    $task = Task::select('tasks.*')
                            ->where('task_id', '=' ,$value->id)
                            ->first();
                    

                    if($task === null) { //we save a new task only if the task does not exist yet
                        
                        try{
                            $objectTask->task_id = $value->id;
                            $objectTask->video_id = $value->video_id;
                            $objectTask->language = $value->language;
                            $objectTask->type = $value->type;
                            $objectTask->priority = $value->priority;
                            $objectTask->created = $value->created;
                            $objectTask->modified = $value->modified;
                            $objectTask->completed = $value->completed;
                            $objectTask->save();
                        
                            $video = Video::select('videos.*')
                                    ->where('video_id', '=' ,$value->video_id)
                                    ->first();

                            if($video === null) { //we save a new video only if the video does not exist yet
                                try{
                                    $v = $API->getVideoInfo(array("video_id" => $value->video_id));
                                    $video = new Video();
                                    $video->video_id = $v->id;
                                    $video->primary_audio_language_code = $v->primary_audio_language_code === null ? "" : $v->primary_audio_language_code;
                                    $video->original_language = $v->original_language === null ? "" : $v->original_language;
                                    $video->title = $v->title === null ? "" : $v->title;
                                    $video->description = $v->description === null ? "" : $v->description;
                                    $video->duration = $v->duration;
                                    $video->thumbnail= $v->thumbnail === null ? "" : $v->thumbnail;
                                    $video->team = $v->team === null ? "" : $v->team;
                                    $video->project = $v->project === null ? "" : $v->project; 
                                    $video->video_url = $v->all_urls[0] === null ? "" : $v->all_urls[0];
                                    $video->save();
                                } catch(QueryException $e) {
                                //return AppBaseController::sendError($e->getMessage());
                                }
                            }
                        } catch(QueryException $e) {
                            //return AppBaseController::sendError($e->getMessage());
                        }
                    
                    }
                }
            } while($resultChunk->meta->next !== null && $resultChunk->meta->offset + $limit < $resultChunk->meta->total_count);
        }
        
        return AppBaseController::sendResponse("", "Backup tests ended succesfully");
    }


    /**
     * Save tasks from Amara
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function saveTasksFromAmara(Request $request)
    {
        $API = new AmaraAPI();
        $tasks = array();
        $offset = 0;
        $limit = 40;

        do{
            $resultChunk = $API->getTasks(array(
                    'team' => 'ted',
                    'open' => true,
                    'order_by'=> '-created',
                    'limit'=> $limit,
                    'offset'=>$offset,
                    ));
            
            $offset += $limit;

            if(isset($resultChunk->objects)) {
                $tasks = $resultChunk->objects;

                foreach ($tasks as $key => $value){
                    $objectTask = new Task();
                    $task = Task::select('tasks.*')
                            ->where('task_id', '=' ,$value->id)
                            ->first();
                    
                    if($task === null) { //we save a new task only if the task does not exist yet
                        try{
                            $objectTask->task_id = $value->id;
                            $objectTask->video_id = $value->video_id;
                            $objectTask->language = $value->language;
                            $objectTask->type = $value->type;
                            $objectTask->priority = $value->priority;
                            $objectTask->created = $value->created;
                            $objectTask->modified = $value->modified;
                            $objectTask->completed = $value->completed;
                            $objectTask->save();
                        
                            $video = Video::select('videos.*')
                                    ->where('video_id', '=' ,$value->video_id)
                                    ->first();

                            if($video === null) { //we save a new video only if the video does not exist yet
                                try{
                                    $v = $API->getVideoInfo(array("video_id" => $value->video_id));
                                    $video = new Video();
                                    $video->video_id = $v->id;
                                    $video->primary_audio_language_code = $v->primary_audio_language_code === null ? "" : $v->primary_audio_language_code;
                                    $video->original_language = $v->original_language === null ? "" : $v->original_language;
                                    $video->title = $v->title === null ? "" : $v->title;
                                    $video->description = $v->description === null ? "" : $v->description;
                                    $video->duration = $v->duration;
                                    $video->thumbnail= $v->thumbnail === null ? "" : $v->thumbnail;
                                    $video->team = $v->team === null ? "" : $v->team;
                                    $video->project = $v->project === null ? "" : $v->project; 
                                    $video->video_url = $v->all_urls[0] === null ? "" : $v->all_urls[0];
                                    $video->save();
                                } catch(QueryException $e) {
                            //return AppBaseController::sendError($e->getMessage());
                                }
                            }
                        } catch(QueryException $e) {
                            //return AppBaseController::sendError($e->getMessage());
                        }
                    }
                }   
            }

        } while($resultChunk->meta->next !== null && $resultChunk->meta->offset + $limit < $resultChunk->meta->total_count);

        return AppBaseController::sendResponse("", "Backup tests ended succesfully");
    }
}
