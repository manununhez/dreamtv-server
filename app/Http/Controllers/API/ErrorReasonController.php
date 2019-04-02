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
            'reason_code' => 'required|string',
            'name' => 'required|string',
            'language' => 'required|string',
            'description' => 'nullable|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $errorReason = ErrorReason::create($input);

        if(is_null($errorReason))
            return $this->sendError('Error Reason could not be created');
        else
            return $this->sendResponse($errorReason->toArray(), 'Error Reason created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $errorReason = ErrorReason::find($code);


        if (is_null($errorReason)) {
            return $this->sendError('ErrorReason with code = '.$code.' not found.');
        }


        return $this->sendResponse($errorReason->toArray(), 'ErrorReason with code = '.$code.' retrieved successfully.');
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
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required|string',
            'language' => 'required|string',
            'description' => 'nullable|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $errorReason = ErrorReason::find($code);
        $errorReason->name =  $input['name'];
        $errorReason->language =  $input['language'];
        
        if(isset($input['description']))
		  $errorReason->description = $input['description'];
        
        $updated = $errorReason->save();

        if($updated)
            return $this->sendResponse($errorReason->toArray(), 'Error reason'. $code .'updated successfully.');
        else
            return $this->sendError('Error reason could not be updated');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {

        $errorReason = ErrorReason::find($code);

        if (!$errorReason) {
            return $this->sendError('ErrorReason with id = '.$id.' not found.');
        }

        $deleted = $errorReason->delete();


        if($deleted)
            return $this->sendResponse($errorReason->toArray(), 'Error reason'. $code .'deleted successfully.');
        else
            return $this->sendError('Error reason could not be deleted');
    }
}