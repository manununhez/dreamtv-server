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

        $minDuration = null;
        $maxDuration = null;

        if(isset($input['min_duration']))
            $minDuration = $input['min_duration'];

        if(isset($input['max_duration']))
            $maxDuration = $input['max_duration'];
        
        switch ($task_type) {
            case "all":
                return $this->getAllTasksForCurrentUser($minDuration, $maxDuration);
            
            case "continue":
                return $this->getContinueTasksForCurrentUser($minDuration, $maxDuration);
            
            case "finished":
                return $this->getFinishedTasksForCurrentUser($minDuration, $maxDuration);
            
            case "myList":
                return $this->getCurrentUserTaskList($minDuration, $maxDuration);
            
            case "test":
                return $this->getTestTasksForCurrentUser($minDuration, $maxDuration);
            
            default:
                return $this->getAllTasksForCurrentUser($minDuration, $maxDuration);

        }
    }

   
    /**
     * Retrieve all review tasks
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getAllTasksForCurrentUser($minDuration, $maxDuration)
    {
        $user = auth()->user();

        $userTasks = $user->userTasks()->pluck('task_id');

        if($minDuration == null && $maxDuration == null){ //all videos
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
        } else if ($maxDuration == null){ //duration > min
            if($user->audio_language != 'NN') {
                //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user, $minDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->where('duration', '>', $minDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50);
            } else {
               //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($minDuration){
                                $query->where('duration', '>', $minDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50); 
            }
        } else if ($minDuration == null) { //$minDuration == null   //duration < max
            if($user->audio_language != 'NN') {
                //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user, $maxDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50);
            } else {
                //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($maxDuration){
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50);
            }
        } else { //interval (min, max)
            if($user->audio_language != 'NN') {
                //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user, $maxDuration, $minDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->where('duration', '>', $minDuration);
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50);
            } else {
                //We only shows tasks not finished yet by the user
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($maxDuration, $minDuration){
                                $query->where('duration', '>', $minDuration);
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->whereNotIn('task_id',$userTasks) //not repeated in UserTasks
                            ->where('language', $user->sub_language)
                            ->paginate(50);
            }
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
    private function getTestTasksForCurrentUser($minDuration, $maxDuration)
    {
        $videoIdArray = VideoTest::select('video_id')->pluck('video_id');
        
        $user = auth()->user();
   
        if($minDuration == null && $maxDuration == null){ //all videos
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
        } else if ($maxDuration == null){ //duration > min
            if($user->audio_language != 'NN') {
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user,$videoIdArray, $minDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '>', $minDuration);
                             })
                            ->where('language', $user->sub_language)
                            ->get();
              
            } else { 
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($videoIdArray, $minDuration){
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '>', $minDuration);
                            })
                            ->where('language', $user->sub_language)
                            ->get();
            }
        } else if ($minDuration == null){ //$minDuration == null   //duration < max
            if($user->audio_language != 'NN') {
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user,$videoIdArray, $maxDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '<', $maxDuration);
                             })
                            ->where('language', $user->sub_language)
                            ->get();
              
            } else {
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($videoIdArray, $maxDuration){
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->where('language', $user->sub_language)
                            ->get();
            }
        } else { //interval (min, max)
            if($user->audio_language != 'NN') {
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($user,$videoIdArray, $minDuration, $maxDuration){
                                $query->where('primary_audio_language_code', $user->audio_language);
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '>', $minDuration);
                                $query->where('duration', '<', $maxDuration);
                             })
                            ->where('language', $user->sub_language)
                            ->get();
              
            } else {
                $tasks = Task::with('videos')
                            ->with('userTasks.userTaskErrors')
                            ->whereHas('videos', function($query) use ($videoIdArray, $minDuration, $maxDuration){
                                $query->whereIn('video_id', $videoIdArray);
                                $query->where('duration', '>', $minDuration);
                                $query->where('duration', '<', $maxDuration);
                            })
                            ->where('language', $user->sub_language)
                            ->get();
            }
        }
        
        return $this->sendResponse($tasks->toArray(), "Test tasks retrieved.");
       
    }

    /**
    *
    *
    *
    */
    private function getCurrentUserTaskList($minDuration, $maxDuration)
    {
        $user = auth()->user();

        $userListTask = $user->userListTasks()->tasks()->videosByDuration($minDuration, $maxDuration)->get();
        
        if($minDuration == null && $maxDuration == null){ //all videos
            $tasks = $userListTask->map(function($list){ 
                    		return Task::with('videos')
                                        ->with('userTasks.userTaskErrors')
                                        ->whereHas('videos', function($query) use ($list){
                                            $query->where('primary_audio_language_code', $list->audio_language_config);
                                        })
                                        ->where('language', $list->sub_language_config)
                                        ->where('task_id', $list->task_id)
                                        ->first();
                    });
        } else if ($maxDuration == null){ //duration > min
            $tasks = $userListTask->map(function($list, $minDuration){ 
                            return Task::with('videos')
                                        ->with('userTasks.userTaskErrors')
                                        ->whereHas('videos', function($query) use ($list, $minDuration){
                                            $query->where('primary_audio_language_code', $list->audio_language_config);
                                            $query->where('duration', '>', $minDuration);
                                        })
                                        ->where('language', $list->sub_language_config)
                                        ->where('task_id', $list->task_id)
                                        ->first();
                    });
        } else if ($minDuration == null){ //$minDuration == null   //duration < max
            $tasks = $userListTask->map(function($list, $maxDuration){ 
                            return Task::with('videos')
                                        ->with('userTasks.userTaskErrors')
                                        ->whereHas('videos', function($query) use ($list, $maxDuration){
                                            $query->where('primary_audio_language_code', $list->audio_language_config);
                                            $query->where('duration', '<', $maxDuration);
                                        })
                                        ->where('language', $list->sub_language_config)
                                        ->where('task_id', $list->task_id)
                                        ->first();
                    });
        } else { //interval (min, max)
            $tasks = $userListTask->map(function($list, $minDuration, $maxDuration){ 
                            return Task::with('videos')
                                        ->with('userTasks.userTaskErrors')
                                        ->whereHas('videos', function($query) use ($list, $minDuration, $maxDuration){
                                            $query->where('primary_audio_language_code', $list->audio_language_config);
                                            $query->where('duration', '>', $minDuration);
                                            $query->where('duration', '<', $maxDuration);
                                        })
                                        ->where('language', $list->sub_language_config)
                                        ->where('task_id', $list->task_id)
                                        ->first();
                    });
        }

        return $this->sendResponse($tasks->toArray(), "Current User Task List retrieved.");
    }
    
    /**
     * Retrieve all review tasks to continue
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    private function getContinueTasksForCurrentUser($minDuration, $maxDuration)
    {
        $user = auth()->user();

        $userTasks = $user->userContinueTasks()->pluck('task_id');//completed false

        if($minDuration == null && $maxDuration == null){ //all videos
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else if ($maxDuration == null){ //duration > min
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($minDuration){
                            $query->where('duration', '>', $minDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else if ($minDuration == null){ //$minDuration == null   //duration < max
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($maxDuration){
                            $query->where('duration', '<', $maxDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else { //interval (min, max)
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($minDuration, $maxDuration){
                            $query->where('duration', '>', $minDuration);
                            $query->where('duration', '<', $maxDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        }
        
        return $this->sendResponse($tasks->toArray(), "Continue tasks retrieved.");
       
    }


    /**
    *
    *
    *
    */
    private function getFinishedTasksForCurrentUser($minDuration, $maxDuration)
    {
        $user = auth()->user();

        $userTasks = $user->userFinishedTasks()->pluck('task_id');//completed true

        if($minDuration == null && $maxDuration == null){ //all videos
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else if ($maxDuration == null){ //duration > min
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($minDuration){
                            $query->where('duration', '>', $minDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else if ($minDuration == null){ //$minDuration == null   //duration < max
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($maxDuration){
                            $query->where('duration', '<', $maxDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        } else { //interval (min, max)
            $tasks = Task::with('videos')
                        ->with('userTasks.userTaskErrors')
                        ->whereHas('videos', function($query) use ($minDuration, $maxDuration){
                            $query->where('duration', '>', $minDuration);
                            $query->where('duration', '<', $maxDuration);
                        })
                        ->whereIn('task_id', $userTasks)
                        ->get();
        }
        
        return $this->sendResponse($tasks->toArray(), "Finished tasks retrieved.");
    }
}
