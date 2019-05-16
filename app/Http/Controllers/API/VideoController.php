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
            'video_id' => 'required|string',
            'primary_audio_language_code' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'thumbnail' => 'required|string',
            'team' => 'required|string',
            'project' => 'required|string',
            'video_url' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $video = Video::create($input);

        if(is_null($video))
            return $this->sendError('Video could not be created', 500);
        else
            return $this->sendResponse($video->toArray(), 'Video created successfully.');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($videoId)
    {
        $video = Video::find($videoId);


        if (is_null($video)) {
            return $this->sendError('Video with id = '.$videoId.' not found.', 400);
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
            'primary_audio_language_code' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'thumbnail' => 'required|string',
            'team' => 'required|string',
            'project' => 'required|string',
            'video_url' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $video->primary_audio_language_code =  $input['primary_audio_language_code'];
        $video->title =  $input['title'];
        $video->description =  $input['description'];
        $video->duration =  $input['duration'];
        $video->thumbnail =  $input['thumbnail'];
        $video->team =  $input['team'];
        $video->project =  $input['project'];
        $video->video_url =  $input['video_url'];

        
        $updated = $video->save();

        if($updated)
            return $this->sendResponse($video->toArray(), 'Video updated successfully.');
        else
            return $this->sendError('Video could not be updated', 500);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $deleted = $video->delete();

        if($deleted)
            return $this->sendResponse($video->toArray(), 'Video deleted successfully.');
        else
            return $this->sendError('Video could not be deleted', 500);

    }
}
