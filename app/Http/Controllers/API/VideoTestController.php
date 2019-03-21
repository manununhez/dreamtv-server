<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\VideoTest;
use Validator;


class VideoTestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videoTests = VideoTest::all();


        return $this->sendResponse($videoTests->toArray(), 'VideoTests retrieved successfully.');
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
            'subtitle_version' => 'required',
            'language_code' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $videoTest = VideoTest::create($input);


        return $this->sendResponse($videoTest->toArray(), 'VideoTest created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videoTest = VideoTest::find($id);


        if (is_null($videoTest)) {
            return $this->sendError('VideoTest not found.');
        }


        return $this->sendResponse($videoTest->toArray(), 'VideoTest retrieved successfully.');
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
            'subtitle_version' => 'required',
            'language_code' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
	
	$videoTest = VideoTest::find($id);
        $videoTest->video_id =  $input['video_id'];
        $videoTest->subtitle_version =  $input['subtitle_version'];
        $videoTest->language_code =  $input['language_code'];

        $videoTest->save();


        return $this->sendResponse($videoTest->toArray(), 'VideoTest updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	$videoTest = VideoTest::find($id);
        $videoTest->delete();


        return $this->sendResponse($videoTest->toArray(), 'VideoTest deleted successfully.');
    }
}
