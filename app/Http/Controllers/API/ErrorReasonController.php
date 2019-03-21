<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\ErrorReason;
use Validator;


class ErrorReasonController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $errorReasons = ErrorReason::all();


        return $this->sendResponse($errorReasons->toArray(), 'Error reasons retrieved successfully.');
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
            'code' => 'required',
            'name' => 'required',
            'language' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $errorReason = ErrorReason::create($input);


        return $this->sendResponse($errorReason->toArray(), 'Error Reason created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $errorReason = ErrorReason::find($id);


        if (is_null($errorReason)) {
            return $this->sendError('ErrorReason not found.');
        }


        return $this->sendResponse($errorReason->toArray(), 'ErrorReason retrieved successfully.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorReason $errorReason)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'language' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $errorReason->name =  $input['name'];
        $errorReason->language =  $input['language'];
        $errorReason->description =  $input['description'];
        

        $errorReason->save();


        return $this->sendResponse($errorReason->toArray(), 'Error Reason updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorReason $errorReason)
    {
        $errorReason->delete();


        return $this->sendResponse($errorReason->toArray(), 'Error reason deleted successfully.');
    }
}