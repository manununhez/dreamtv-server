<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Task;
use App\UserTasksError;
use App\VideoTest;
use Validator;


class TaskController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();


        return $this->sendResponse($tasks->toArray(), 'Tasks retrieved successfully.');
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
            'task_id' => 'required',
            'video_id' => 'required',
            'language' => 'required',
            'type' => 'required',
            'created' => 'required',
            'modified' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $task = Task::create($input);


        return $this->sendResponse($task->toArray(), 'Task created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($task_id)
    {
        $task = Task::find($task_id);


        if (is_null($task)) {
            return $this->sendError('Task not found.');
        }


        return $this->sendResponse($task->toArray(), 'Task retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'video_id' => 'required',
            'language' => 'required',
            'type' => 'required',
            'created' => 'required',
            'modified' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $task->video_id =  $input['video_id'];
        $task->language =  $input['language'];
        $task->type =  $input['type'];
        $task->created =  $input['created'];
        $task->modified =  $input['modified'];
        $task->completed = isset($input['completed']) ? $input['completed'] : null;
        
        $task->save();


        return $this->sendResponse($task->toArray(), 'Task updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();


        return $this->sendResponse($task->toArray(), 'Task deleted successfully.');
    }





    /**
     * List of tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function tasksByCategories(Request $request)
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
                //break;
            case "test":
                //echo "getTestTasks!";
                return $this->getTestTasks($request);
                //break;
            default:
                //echo "by default getAllTasks!";
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
        $user = auth()->user();

        $userTasksError = UserTasksError::where('user_id', '=', $user->id)
                            ->groupBy('task_id')
                            ->pluck('task_id')
                            ->all();

        if($user->audio_language != 'NN') {

            //We only shows tasks not finished yet by the user
            $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')
                        ->select('tasks.*', 'videos.*')
                        ->whereNotIn('tasks.task_id', $userTasksError)
                        // ->where('videos.project','=','tedtalks') //--------------><
                        // ->where(function ($query) {
                        //     $query->where('tasks.type', 'Review')
                        //           ->orWhere('tasks.type', 'Approve');
                        //     })
                        ->where('tasks.type', 'Review')
                        ->where('tasks.language','=', $user->sub_language)
                        ->where('videos.primary_audio_language_code','=', $user->audio_language)
                        // ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(16);
        
        } else {
                            
            //We only shows tasks not finished yet by the user
            $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')
                        ->select('tasks.*', 'videos.*')
                        ->whereNotIn('tasks.task_id', $userTasksError)
                        // ->where('videos.project','=','tedtalks') //--------------><
                        // ->where(function ($query) {
                        //     $query->where('tasks.type', 'Review')
                        //           ->orWhere('tasks.type', 'Approve');
                        //     })
                        ->where('tasks.type', 'Review')
                        ->where('tasks.language','=', $user->sub_language)
                        // ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                        ->paginate(16);
        } 
        
        return $this->sendResponse($tasks->toArray(), "All tasks retrieved.");
        

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
        $user = auth()->user();

        //We get all the videos already seen by the user
        $userTasksError = UserTasksError::where('user_id', '=', $user->id) //DB::table('userTasks')
                            ->groupBy('task_id')
                            ->pluck('task_id')
                            ->all();

        $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                    ->select('tasks.*', 'videos.*')
                    ->whereIn('tasks.task_id', $userTasksError)
                    // ->where('videos.project','=','tedtalks') //--------------><
                    // ->where(function ($query) {
                    //     $query->where('tasks.type', 'Review')
                    //           ->orWhere('tasks.type', 'Approve');
                    //     })
                    ->where('tasks.type', 'Review')
                    // ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                    ->paginate(50);
        
        return $this->sendResponse($tasks->toArray(), "Continue tasks retrieved.");
       
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
        $videoIdArray = VideoTest::select('video_id')->pluck('video_id');
        
        $user = auth()->user();
   
        if($user->audio_language != 'NN') {
            $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                    ->select('tasks.*', 'videos.*')
                    ->where('tasks.language','=', $user->sub_language)
                    ->where('videos.primary_audio_language_code','=', $user->audio_language)
                    // ->where('tasks.type', $Translate)
                    ->whereIn('videos.video_id', $videoIdArray)
                    // ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                    ->paginate(50);
          
        } else {
            $tasks = Task::join('videos', 'tasks.video_id', '=', 'videos.video_id')//DB::table('tasks')
                    ->select('tasks.*', 'videos.*')
                    ->where('tasks.language','=', $user->sub_language)
                    // ->where('tasks.type', $Translate)
                    ->whereIn('videos.video_id', $videoIdArray)
                    // ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                    ->paginate(50);
       
        }
        
        return $this->sendResponse($tasks->toArray(), "Test tasks retrieved.");
       
    }
}
