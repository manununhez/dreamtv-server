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
 * @group Backup videos
 *
 * APIs for backuping videos
 */
class BackupVideosController extends AppBaseController
{

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

                if($tasks == []) {
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

                    if($tasks == []) {
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
     * Save tasks from Amara (get only Review Tasks)
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
        $Review = 'Review';
        
        do{
            $resultChunk = $API->getTasks(array(
                    'team' => 'ted',
                    'open' => true,
                    'order_by'=> '-created',
                    'limit'=> $limit,
                    'offset'=>$offset,
                    'type' => $Review,
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
