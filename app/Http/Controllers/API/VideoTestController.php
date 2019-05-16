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
            'video_id' => 'required|string',
            'subtitle_version' => 'required|integer',
            'language_code' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }


        $videoTest = VideoTest::create($input);

        if(is_null($videoTest))
            return $this->sendError('VideoTest could not be created', 500);
        else
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


        if (!$videoTest) {
            return $this->sendError('VideoTest with id = '.$id.' not found.', 400);
        }


        return $this->sendResponse($videoTest->toArray(), 'VideoTest with id = '.$id.' retrieved successfully.');
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
            'video_id' => 'required|string',
            'subtitle_version' => 'required|integer',
            'language_code' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }
	
        $videoTest = VideoTest::find($id);

         if (!$videoTest) {
            return $this->sendError('VideoTest with id = '.$id.' not found.', 400);
        }

        // $updated = $product->fill($request->all())->save();
        
        $videoTest->video_id =  $input['video_id'];
        $videoTest->subtitle_version =  $input['subtitle_version'];
        $videoTest->language_code =  $input['language_code'];

        $updated = $videoTest->save();

        if($updated)
            return $this->sendResponse($videoTest->toArray(), 'VideoTest updated successfully.');
        else
            return $this->sendError('VideoTest could not be updated', 500);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	$videoTest = VideoTest::find($id);

         if (!$videoTest) {
            return $this->sendError('VideoTest with id = '.$id.' not found.', 400);
        }

        $deleted = $videoTest->delete();

        if($deleted)
            return $this->sendResponse($videoTest->toArray(), 'VideoTest deleted successfully.');
        else
            return $this->sendError('VideoTest could not be deleted', 500);
    }
}
