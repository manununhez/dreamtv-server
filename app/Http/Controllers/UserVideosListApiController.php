<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\UserVideosList;
use App\Models\UserAccount;

/**
 * @resource UserVideosList
 *
 * Longer description
 */
class UserVideosListApiController extends AppBaseController
{
    /**
     * Get all videos from user list.
     *
     * Display a listing of the resource. 
     * Pagination mode : Displays 16 items per page
     *
     * QueryParams => 'page':<number_page>  integer
     * 
     * Requires user token - header 'Authorization'
     */
    public function index(Request $request)
    {
        $user = DB::table('user_accounts')
                ->select('user_accounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            $user_videos_lists = DB::table('user_videos_lists')
                                ->where('user_videos_lists.user_id', '=', $user->id)
                                ->groupBy('user_videos_lists.video_id')
                                ->pluck('user_videos_lists.video_id') //return an array of video_id
                                ->all();

            $tasks = DB::table('tasks')
                            ->join('videos', 'tasks.video_id', '=', 'videos.video_id')
                            ->select('tasks.*', 'videos.*')
                            ->whereIn('tasks.video_id', $user_videos_lists)
                            ->groupBy('tasks.video_id','tasks.id','tasks.task_id', 'tasks.language','tasks.type', 'tasks.priority', 'tasks.created', 'tasks.modified', 'tasks.completed', 'tasks.created_at', 'tasks.updated_at', 'videos.id','videos.video_id','videos.primary_audio_language_code','videos.original_language','videos.title','videos.description','videos.duration', 'videos.thumbnail', 'videos.team','videos.project','video_url','videos.created_at', 'videos.updated_at')
                            ->paginate(50);

            return $tasks;

        }
        else
            return AppBaseController::sendError("User not found.");
    }


    /**
     * Add video to user video list
     * Store a newly created resource in storage.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     */
    public function store(Request $request)
    {
        $user = DB::table('user_accounts')
                ->select('user_accounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            try {
                $userList = new UserVideosList();
                $userList->user_id = $user->id;
                $userList->video_id = $request['video_id'];
                $userList->save();

                return AppBaseController::sendResponse($userList, "Video added to user list correctly.");
            } catch(QueryException $e) {
                    return AppBaseController::sendError($e->getMessage());
            }
        }
        else
            return AppBaseController::sendError("User not found.");

    }

    /**
     * Show User Video Info
     * Verify If Video Is In UserList
     *
     * Display the specified resource.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     */
    public function show(Request $request)
    {
        $user = DB::table('user_accounts')
                ->select('user_accounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            $user_videos_lists = DB::table('user_videos_lists')
                            ->where('user_videos_lists.user_id', '=', $user->id)
                            ->where('user_videos_lists.video_id', '=', $request['video_id'])
                            ->get();

            return AppBaseController::sendResponse($user_videos_lists, "");
        }
        else
            return AppBaseController::sendError("User not found.");
    }


    /**
     * Remove Video from UserVideoList
     * Remove the specified resource from storage.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     */
    public function destroy(Request $request)
    {
        $user = DB::table('user_accounts')
                ->select('user_accounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            try {
                $matchThese = ['video_id' => $request['video_id'], 'user_id' => $user->id];

                $userVideosList = UserVideosList::where($matchThese)->delete();
                
                return AppBaseController::sendResponse($userVideosList, $request['video_id'], $user->id, "Video removed to user list correctly.");            
            } catch(QueryException $e) {
                    return AppBaseController::sendError($e->getMessage());
            }
        }
        else
            return AppBaseController::sendError("User not found.");
    }
}
