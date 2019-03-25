<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserVideo;
use Validator;


class UserVideoController extends BaseController
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
    public function index()
    {
        //$userVideos = UserVideo::all();

        $user = auth()->user();

        $userVideos = UserVideo::where('user_id', '=', $user->id)
                            ->groupBy('video_id')
                            ->pluck('video_id') //return an array of video_id
                            ->all();


        $tasks = Task::with('videos')
                ->whereIn('task_id', $userVideos)
                ->paginate(50);


        return $this->sendResponse($userVideos->toArray(), 'User videos retrieved successfully.');
    }


    /**
     * Add video to user video list
     * Store a newly created resource in storage.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'user_id' => 'required',
            'video_id' => 'required',
            'sub_language_config' => 'required',
            'audio_language_config' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $userVideo = UserVideo::create($input);


        return $this->sendResponse($userVideo->toArray(), 'User video created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * Show User Video Info
     *
     * Display the specified resource.
     *
     * Parameters => video_id (text, mandatory)
     *
     * Requires user token - header 'Authorization'
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($video_id)
    {
        $user = auth()->user();

        $userVideos = UserVideo::where('user_id', '=', $user->id)
                            ->where('video_id', $video_id)
                            ->get();


        if (is_null($userVideos)) {
            return $this->sendError('ErrorReason not found.');
        }


        return $this->sendResponse($userVideos->toArray(), 'User videos retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code)
    {
        // $input = $request->all();


        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'language' => 'required'
        // ]);


        // if($validator->fails()){
        //     return $this->sendError('Validation Error.', $validator->errors());       
        // }

        // $errorReason = ErrorReason::find($code);
        // $errorReason->name =  $input['name'];
        // $errorReason->language =  $input['language'];
        // $errorReason->description = isset($input['description']) ? $input['description'] : null;
        
        // $errorReason->save();


        // return $this->sendResponse($errorReason->toArray(), 'Error reason'. $code .'updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     * Remove Video from UserVideoList
     *
     * Parameters => video_id (text, mandatory)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($video_id)
    {
        $user = auth()->user();

        $matchThese = ['video_id' => $video_id, 'user_id' => $user->id];

        $userVideos = UserVideo::where($matchThese)->delete();

        return $this->sendResponse($userVideos->toArray(), 'User video '.$video_id.' deleted successfully.');
    }

}


