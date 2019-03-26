<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\UserVideo;
use App\Task;
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
        $userVideos = UserVideo::all();

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
            'video_id' => 'required',
            'sub_language_config' => 'required',
            'audio_language_config' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $input['user_id'] = auth()->user()->id;
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
    public function show($id)
    {

        $userVideos = UserVideo::find($id);


        if (is_null($userVideos)) {
            return $this->sendError('User Video not found.');
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
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
		'video_id' => 'required',
		'sub_language_config' => 'required',
		'audio_language_config' => 'required'
        ]);


         if($validator->fails()){
             return $this->sendError('Validation Error.', $validator->errors());       
         }

    	$userVideo = UserVideo::find($id);
    	$userVideo->video_id = $input['video_id'];
    	$userVideo->sub_language_config = $input['sub_language_config'];
    	$userVideo->audio_language_config = $input['audio_language_config'];
    	$userVideo->save();


	   return $this->sendResponse($userVideo->toArray(), 'UserVideo updated successfully.');
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
    public function destroy($id)
    {
    	$userVideo = UserVideo::find($id);
    	$userVideo->delete();

        return $this->sendResponse($userVideo->toArray(), 'User video deleted successfully.');
    }

}


