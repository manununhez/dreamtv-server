<?php

namespace App\Http\Controllers\API\Amara;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
Use App\AmaraAPI;
Use App\Task;
use App\Video;
Use App\User;
use App\VideoTest;
use App\UserTasksError;  

/**
 * @group Backup videos
 *
 * APIs for backuping videos
 */
class BackupVideosController extends BaseController
{

    /**
     * Save test tasks from Amara
     *
     * Display a listing of the resource.
     *
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
        $language = 'pl';

        $videoIdArray = VideoTest::select('video_id')->pluck('video_id');

        foreach ($videoIdArray as $videoId){
            
            $offset = 0;
            $limit = 10;
                
            do{
                $resultChunk = $API->getTasks(array(
                        'team' => 'ted',
                        'order_by'=> '-modified',
                        'video_id'=>$videoId,
                        'language'=>$language,
                        //'assignee'=>'ted_Snai',
                        'type' => $Translate,
                        'limit'=> $limit,
                        'offset'=>$offset,
                        ));


                $tasks = $resultChunk->objects;

                if($tasks == []) {
                    $resultChunk = $API->getTasks(array(
                        'team' => 'ted',
                        'order_by'=> '-modified',
                        'video_id'=>$videoId,
                        'language'=>$language,
                        //'assignee'=>'ted_Snai',
                        'type' => $Review,
                        'limit'=> $limit,
                        'offset'=>$offset,
                        ));

                    $tasks = $resultChunk->objects;

                    if($tasks == []) {
                        $resultChunk = $API->getTasks(array(
                            'team' => 'ted',
                            'order_by'=> '-modified',
                            'video_id'=>$videoId,
                            'language'=>$language,
                            //'assignee'=>'ted_Snai',
                            'type' => $Approve,
                            'limit'=> $limit,
                            'offset'=>$offset,
                            ));

                        $tasks = $resultChunk->objects;

                    }
                }


                $offset += $limit;

                foreach ($tasks as $key => $value)
                {     
                    $video = Video::find($value->video_id);

                    if(is_null($video)) { //we save a new video only if the video does not exist yet
                        try{
                            $v = $API->getVideoInfo(array("video_id" => $value->video_id));
                
                            Video::create([
                                'video_id' => $v->id,
                                'primary_audio_language_code' => $v->primary_audio_language_code,
                                'original_language' => $v->original_language,
                                'title' => $v->title,
                                'description' => $v->description,
                                'duration' => $v->duration,
                                'thumbnail' => $v->thumbnail,
                                'team' => $v->team,
                                'project' => $v->project,
                                'video_url' => $v->all_urls[0],
                            ]);

                            $task = Task::find($value->id);

                            if(is_null($task)) { //we save a new task only if the task does not exist yet
                                
                                try{
                                    Task::create([
                                        'task_id' => $value->id,
                                        'video_id' => $value->video_id,
                                        'language' => $value->language,
                                        'type' => $value->type,
                                        'created' => $value ->created,
                                        'modified' => $value->modified,
                                        'completed' => $value->completed,
                                    ]);
                            
                                    
                                } catch(QueryException $e) {
                                    //Log::info($e->getMessage());
                                    return $this->sendError($e->getMessage());
                                }
                            
                            }
                        } catch(QueryException $e) {
                            //Log::info($e->getMessage());
                            return $this->sendError($e->getMessage());

                        }
                    }
                }
            } while($resultChunk->meta->next !== null && $resultChunk->meta->offset + $limit < $resultChunk->meta->total_count);
        }
        
        return $this->sendResponse($tasks, "Backup tests ended succesfully");
    }


    /**
     * Save tasks from Amara (get only Review Tasks)
     *
     * open (boolean) – Show only incomplete tasks
     * -created Creation date (descending)
     * type (string) – Show only tasks of a given type
     * completed-before (integer) – Show only tasks completed before a given date (as a unix timestamp)
     * completed-after (integer) – Show only tasks completed before a given date (as a unix timestamp)
     * Display a listing of the resource.
     *
     * 1483228740 Is equivalent to: 12/31/2016 @ 11:59pm (UTC)
     */
    public function saveTasksFromAmara(Request $request)
    {
        $API = new AmaraAPI();
        $tasks = array();
        $offset = 0;
        $limit = 10;
        $order_by_date_creation_asc = '-created';
        $Review = 'Review';
        $team = 'ted';
        $show_incomplete_task = true;

        //$task = Task::orderBy('created', 'desc')->first();
        
       // if(is_null($task))
         //   $completed_after = 1483228800; //default after 2016
        //else
          //  $completed_after = strtotime($task->created); //after the last task inserted

        do{
            $resultChunk = $API->getTasks(array(
                    'team' => $team,
                    'open' => $show_incomplete_task,
                    'order_by' => $order_by_date_creation_asc,
                   // 'completed-after' => $completed_after,
                    'type' => $Review,
                    'limit'=> $limit,
                    'offset'=>$offset,
                    ));
            
            $offset += $limit;

            if(isset($resultChunk->objects)) 
            {
                $tasks = $resultChunk->objects;

                foreach ($tasks as $key => $value)
                {   
                    $video = Video::find($value->video_id);

                    if(is_null($video)) { //we save a new video only if the video does not exist yet
                        try{
                            $v = $API->getVideoInfo(array("video_id" => $value->video_id));
                
                            Video::create([
                                'video_id' => $v->id,
                                'primary_audio_language_code' => $v->primary_audio_language_code,
                                'title' => $v->title,
                                'description' => $v->description,
                                'duration' => $v->duration,
                                'thumbnail' => $v->thumbnail,
                                'team' => $v->team,
                                'project' => $v->project,
                                'video_url' => $v->all_urls[0],
                            ]);

                            $task = Task::find($value->id);

                            if(is_null($task)) { //we save a new task only if the task does not exist yet
                                
                                try{
                                    Task::create([
                                        'task_id' => $value->id,
                                        'video_id' => $value->video_id,
                                        'language' => $value->language,
                                        'type' => $value->type,
                                        'created' => $value ->created,
                                        'modified' => $value->modified,
                                        'completed' => $value->completed,
                                    ]);
                            
                                    
                                } catch(QueryException $e) {
                                    //Log::info($e->getMessage());
                                    return $this->sendError($e->getMessage());
                                }
                            
                            }
                        } catch(QueryException $e) {
                            //Log::info($e->getMessage());
                            return $this->sendError($e->getMessage());

                        }
                    }
                }   
            }

        } while($resultChunk->meta->next !== null && $resultChunk->meta->offset + $limit < $resultChunk->meta->total_count);

        return $this->sendResponse($tasks, "Backup tests ended succesfully");

    }
}
