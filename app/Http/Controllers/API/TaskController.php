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
                return $this->getAllTasksForCurrentUser($request);
                //break;
            case "continue":
                //echo "getContinueTasks!";
                return $this->getContinueTasksForCurrentUser($request);
                //break;
            case "finished":
                //getAlreadyDoneTasks();
                //break;
            case "myList":
                return $this->getCurrentUserTaskList($request);
            case "test":
                //echo "getTestTasks!";
                return $this->getTestTasksForCurrentUser($request);
                //break;
            default:
                //echo "by default getAllTasks!";
                return $this->getAllTasksForCurrentUser($request);

        }
    }


   
    /**
     * Retrieve all review tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getAllTasksForCurrentUser(Request $request)
    {
        $user = auth()->user();

        // $userTasksError = UserTasksError::where('user_id', '=', $user->id)
        //                     ->groupBy('task_id')
        //                     ->pluck('task_id')
        //                     ->all();
        $userTasksError = $user->userTasksErrors()->groupBy('task_id')->pluck('task_id');

	   if($user->audio_language != 'NN') {
        //     //We only shows tasks not finished yet by the user
            $tasks = Task::with('videos')
                        ->whereHas('videos', function($query) use ($user){
            				$query->where('primary_audio_language_code', $user->audio_language);
            			})
            			->whereNotIn('task_id',$userTasksError)
            			->where('language', '=', $user->sub_language)
            			->paginate(16); 
        
        } else {           
        //     //We only shows tasks not finished yet by the user
       		$tasks = Task::with('videos')
            			->whereNotIn('task_id',$userTasksError)
            			->where('language', '=', $user->sub_language)
            			->paginate(16);

        } 
        
        return $this->sendResponse($tasks->toArray(), "All tasks retrieved.");
    }


    private function getCurrentUserTaskList(Request $request)
    {
        $user = auth()->user();

        $userVideos = UserVideo::where('user_id', $user->id)->get();
        
        $userVideosIdArray = $userVideos->groupBy('video_id')->pluck('video_id');                          
        
        $tasks = Task::with('videos')
                ->whereHas('videos', function($query) use ($userVideos, $userVideosIdArray){
                    $query->where('primary_audio_language_code', $userVideos->audio_language_config);
                    $query->whereIn('video_id',$userVideosIdArray);
                })
                ->where('language', $userVideos->sub_language_config)
                ->paginate(50);

        return $this->sendResponse($tasks->toArray(), "Current User Task List retrieved.");
    }
    
    /**
     * Retrieve all review tasks to continue
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getContinueTasksForCurrentUser(Request $request)
    {
        $user = auth()->user();

        //We get all the videos already seen by the user
        // $userTasksError = UserTasksError::where('user_id', '=', $user->id) //DB::table('userTasks')
        //                     ->groupBy('task_id')
        //                     ->pluck('task_id')
        //                     ->all();

        $userTasksError = $user->userTasksErrors()->groupBy('task_id')->pluck('task_id');


        $tasks = Task::with('videos')
                    ->whereIn('task_id', $userTasksError)
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
    private function getTestTasksForCurrentUser(Request $request)
    {
        $videoIdArray = VideoTest::select('video_id')->pluck('video_id');
        
        $user = auth()->user();
   
        if($user->audio_language != 'NN') {
            $tasks = Task::with('videos')
                            ->whereHas('videos', function($query) use ($user,$videoIdArray){
    		    		        $query->where('primary_audio_language_code', $user->audio_language);
    				            $query->whereIn('video_id', $videoIdArray);
    			             })
                            ->where('language','=', $user->sub_language)
                            ->paginate(50);
          
        } else {
            $tasks = Task::with('videos')
                            ->whereHas('videos', function($query) use ($videoIdArray){
    				            $query->whereIn('video_id', $videoIdArray);
                            })
                            ->where('language','=', $user->sub_language)
                            ->paginate(50);
       
        }
        
        return $this->sendResponse($tasks->toArray(), "Test tasks retrieved.");
       
    }
}
