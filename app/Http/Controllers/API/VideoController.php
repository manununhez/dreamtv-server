<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Video;
use Validator;


class VideoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();


        return $this->sendResponse($videos->toArray(), 'Videos retrieved successfully.');
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
            'video_id' => 'required',
            'primary_audio_language_code' => 'required',
            'original_language' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'thumbnail' => 'required',
            'team' => 'required',
            'project' => 'required',
            'video_url' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $video = Video::create($input);


        return $this->sendResponse($video->toArray(), 'Video created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($video_id)
    {
        $video = Video::find($video_id);


        if (is_null($video)) {
            return $this->sendError('Video not found.');
        }


        return $this->sendResponse($video->toArray(), 'Video retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'primary_audio_language_code' => 'required',
            'original_language' => 'required',
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'thumbnail' => 'required',
            'team' => 'required',
            'project' => 'required',
            'video_url' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $video->primary_audio_language_code =  $input['primary_audio_language_code'];
        $video->original_language =  $input['original_language'];
        $video->title =  $input['title'];
        $video->description =  $input['description'];
        $video->duration =  $input['duration'];
        $video->thumbnail =  $input['thumbnail'];
        $video->team =  $input['team'];
        $video->project =  $input['project'];
        $video->video_url =  $input['video_url'];

        $video->save();


        return $this->sendResponse($video->toArray(), 'Video updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();


        return $this->sendResponse($video->toArray(), 'Video deleted successfully.');
    }
}