<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Task;
use App\UserTask;
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
        $tasks = Task::orderBy('task_id', 'desc')->get();

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
            'task_id' => 'required|integer',
            'video_id' => 'required|string',
            'language' => 'required|string',
            'type' => 'required|string',
            'created' => 'required|string',
            'modified' => 'required|string',
            'completed' => 'nullable|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $task = Task::create($input);

        if(is_null($task))
            return $this->sendError('Task could not be created', 500);
        else
            return $this->sendResponse($task->toArray(), 'Task created successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function show($taskId)
    {
        $task = Task::find($taskId);


        if (is_null($task)) {
            return $this->sendError('Task with task_id = '.$taskId.' not found.', 400);
        }


        return $this->sendResponse($task->toArray(), 'Task with task_id = '.$taskId.' retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $taskId)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'video_id' => 'required|string',
            'language' => 'required|string',
            'type' => 'required|string',
            'created' => 'required|string',
            'modified' => 'required|string',
            'completed' => 'nullable|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $task = Task::find($taskId);

         if (!$task) {
            return $this->sendError('Task with task_id = '.$taskId.' not found.', 400);
        }

        $task->video_id =  $input['video_id'];
        $task->language =  $input['language'];
        $task->type =  $input['type'];
        $task->created =  $input['created'];
        $task->modified =  $input['modified'];
        
        if(isset($input['completed']))
		  $task->completed = $input['completed'];
        
        $updated = $task->save();


        if($updated)
            return $this->sendResponse($task->toArray(), 'Task updated successfully.');
        else
            return $this->sendError('Task could not be updated', 500);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function delete($taskId)
    {
        $task = Task::find($taskId);

         if (!$task) {
            return $this->sendError('Task with task_id = '.$taskId.' not found.', 400);
        }

        $deleted = $task->delete();

        if($deleted)
            return $this->sendResponse($task->toArray(), 'Task deleted successfully.');
        else
            return $this->sendError('Task could not be deleted', 500);
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

        $input = $request->all();


        $validator = Validator::make($input, [
            'type' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $task_type = $input['type'];
        
        switch ($task_type) {
            case "all":
                return $this->getAllTasksForCurrentUser();
            
            case "continue":
                return $this->getContinueTasksForCurrentUser();
            
            case "finished":
                return $this->getFinishedTasksForCurrentUser();
            
            case "myList":
                return $this->getCurrentUserTaskList();
            
            case "test":
                return $this->getTestTasksForCurrentUser();
            
            default:
                return $this->getAllTasksForCurrentUser();

        }
    }

   
    /**
     * Retrieve all review tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getAllTasksForCurrentUser()
    {
        $user = auth()->user();

        $userTasks = $user->userTasks()->pluck('task_id');

        if($user->audio_language != 'NN') {
            //We only shows tasks not finished yet by the user
            $tasks = Task::with('videos')
			->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($user){
            				$query->where('primary_audio_language_code', $user->audio_language);
            			})
            			->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
            			->where('language', $user->sub_language)
            			->paginate(50); 
        
        } else {           
            //We only shows tasks not finished yet by the user
       		$tasks = Task::with('videos')
				->with('userTasks.userTaskErrors')
            			->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
            			->where('language', $user->sub_language)
            			->paginate(50);

        } 
        
        return $this->sendResponse($tasks->toArray(), "All tasks retrieved.");
    }


       /**
     * Retrieve all test tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getTestTasksForCurrentUser()
    {
        $videoIdArray = VideoTest::select('video_id')->pluck('video_id');
        
        $user = auth()->user();
   
        if($user->audio_language != 'NN') {
            $tasks = Task::with('videos')
			->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($user,$videoIdArray){
                            $query->where('primary_audio_language_code', $user->audio_language);
                            $query->whereIn('video_id', $videoIdArray);
                         })
                        ->where('language', $user->sub_language)
                        ->get();
          
        } else {
            $tasks = Task::with('videos')
			->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($videoIdArray){
                            $query->whereIn('video_id', $videoIdArray);
                        })
                        ->where('language', $user->sub_language)
                        ->get();
       
        }
        
        return $this->sendResponse($tasks->toArray(), "Test tasks retrieved.");
       
    }

    /**
    *
    *
    *
    */
    private function getCurrentUserTaskList()
    {
        $user = auth()->user();

        $userListTask = $user->userListTasks()->get();
        
        $tasks = $userListTask->map(function($list){ 
                		return Task::with('videos')
					->with('userTasks.userTaskErrors')
                                    ->whereHas('videos', function($query) use ($list){
                                        $query->where('primary_audio_language_code', $list->audio_language_config);
                                    })
                                    ->where('language', $list->sub_language_config)
                                    ->where('task_id', $list->task_id)
                                    ->firstOrFail();
                });

        return $this->sendResponse($tasks->toArray(), "Current User Task List retrieved.");
    }
    
    /**
     * Retrieve all review tasks to continue
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getContinueTasksForCurrentUser()
    {
        $user = auth()->user();

        $userTasks = $user->userContinueTasks()->pluck('task_id');//completed false

        $tasks = Task::with('videos')
			->with('userTasks.userTaskErrors')
                    ->whereIn('task_id', $userTasks)
                    ->get();
        
        return $this->sendResponse($tasks->toArray(), "Continue tasks retrieved.");
       
    }


    /**
    *
    *
    *
    */
    private function getFinishedTasksForCurrentUser()
    {
        $user = auth()->user();

        $userTasks = $user->userFinishedTasks()->pluck('task_id');//completed true

        $tasks = Task::with('videos')
			->with('userTasks.userTaskErrors')
                    ->whereIn('task_id', $userTasks)
                    ->get();
        
        return $this->sendResponse($tasks->toArray(), "Finished tasks retrieved.");
    }
}
