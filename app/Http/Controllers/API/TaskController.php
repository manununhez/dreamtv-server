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
            'task_id' => 'required|integer',
            'video_id' => 'required|string',
            'language' => 'required|string',
            'type' => 'required|string',
            'created' => 'required|string',
            'modified' => 'required|string',
            'completed' => 'nullable|string'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $task = Task::create($input);

        if(is_null($task))
            return $this->sendError('Task could not be created');
        else
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
            return $this->sendError('Task with task_id = '.$task_id.' not found.');
        }


        return $this->sendResponse($task->toArray(), 'Task with task_id = '.$task_id.' retrieved successfully.');
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
            'video_id' => 'required|string',
            'language' => 'required|string',
            'type' => 'required|string',
            'created' => 'required|string',
            'modified' => 'required|string',
            'completed' => 'nullable|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
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
            return $this->sendError('Task could not be updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $deleted = $task->delete();

        if($deleted)
            return $this->sendResponse($task->toArray(), 'Task deleted successfully.');
        else
            return $this->sendError('Task could not be deleted');
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
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $task_type = $input['type'];
        
        switch ($task_type) {
            case "all":
                return $this->getAllTasksForCurrentUser($request);
            
            case "continue":
                return $this->getContinueTasksForCurrentUser($request);
            
            case "finished":
                return $this->getFinishedTasksForCurrentUser($request);
            
            case "myList":
                return $this->getCurrentUserTaskList($request);
            
            case "test":
                return $this->getTestTasksForCurrentUser($request);
            
            default:
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

        $userTasks = $user->userTasks->groupBy('task_id')->pluck('task_id');

        if($user->audio_language != 'NN') {
            //We only shows tasks not finished yet by the user
            $tasks = Task::with('videos')
                        ->whereHas('videos', function($query) use ($user){
            				$query->where('primary_audio_language_code', $user->audio_language);
            			})
            			->whereNotIn('task_id',$userTasks)
            			->where('language', $user->sub_language)
            			->paginate(50); 
        
        } else {           
            //We only shows tasks not finished yet by the user
       		$tasks = Task::with('videos')
            			->whereNotIn('task_id',$userTasks)
            			->where('language', $user->sub_language)
            			->paginate(50);

        } 
        
        return $this->sendResponse($tasks->toArray(), "All tasks retrieved.");
    }

    /**
    *
    *
    *
    */
    private function getCurrentUserTaskList(Request $request)
    {
        $user = auth()->user();

        $userListTask = $user->userListTasks()->get();
        
        $userTasksIdArray = $userListTask->groupBy('task_id')->pluck('task_id');                          

        $tasks = $userListTask->map(function($list){ 
                		return Task::with('videos')
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
    private function getContinueTasksForCurrentUser(Request $request)
    {
        $user = auth()->user();

        $userTasks = $user->userTasks()->groupBy('task_id')->pluck('task_id');

        $tasks = Task::with('videos')
                    ->whereIn('task_id', $userTasks)
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
                        ->where('language', $user->sub_language)
                        ->paginate(50);
          
        } else {
            $tasks = Task::with('videos')
                        ->whereHas('videos', function($query) use ($videoIdArray){
				            $query->whereIn('video_id', $videoIdArray);
                        })
                        ->where('language', $user->sub_language)
                        ->paginate(50);
       
        }
        
        return $this->sendResponse($tasks->toArray(), "Test tasks retrieved.");
       
    }


    /**
    *
    *
    *
    */
    private function getFinishedTasksForCurrentUser(Request $request)
    {
        $user = auth()->user();

        $userTasks = $user->userTasks()->where('completed', 1)->groupBy('task_id')->pluck('task_id');

        $tasks = Task::with('videos')
                    ->whereIn('task_id', $userTasks)
                    ->paginate(50);
        
        return $this->sendResponse($tasks->toArray(), "Finished tasks retrieved.");
    }
}
