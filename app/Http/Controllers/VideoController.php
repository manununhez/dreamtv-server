<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\AmaraAPI;


/**
 * @group Videos
 *
 * APIs for retrieving videos
 */
class VideoController extends AppBaseController
{

   /**
     * Get information about all videos in a team/project
     *
     * Note that this can take a long time on teams/projects
     * with many videos.
     *
     * You can pass a callable function as $r['filter'] to perform an operation
     * during the loop. For example, set ->meta->next to null if a certain creation
     * date has been reached.
     *
     * Use $params['offset'] and your own loop
     * if you'd rather not wait for this method to finish.
     *
     * Listing videos from Amara
     */
    public function index(Request $request)
    {
        $API = new AmaraAPI();
        $r = $request->all();
        $videos = $API->getVideos($r);
        return AppBaseController::sendResponse($videos, ""); 
        //return response()->json($response);
    }

    /**
     * Retrieve metadata info about a video
     *
     * The same info can be retrieved by video id or by video url,
     * since each video url is associated to a unique video id.
     * Listing an specific video from Amara.
     *
     */
    public function show(Request $request)
    {
        $API = new AmaraAPI();
        $r = $request->all();
        $video = $API->getVideoInfo($r);
        //return response()->json($response);
        return AppBaseController::sendResponse($video, ""); 

    }

}
