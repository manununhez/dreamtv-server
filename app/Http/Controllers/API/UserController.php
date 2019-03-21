<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


/**
 * @group User account
 *
 * APIs for retrieving users account
 */
class UserController extends BaseController
{
    /*
     * Update authenticated user.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'interface_mode' => 'required',
            'interface_language' => 'required',
            'sub_language' => 'required',
            'audio_language' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

	    $user = auth()->user();
        $user->audio_language = $request['audio_language'];     
        $user->interface_mode = $request['interface_mode']; 
        $user->interface_language = $request['interface_language']; 
        $user->sub_language = $request['sub_language']; 
        $user->save();


        return $this->sendResponse($user->toArray(), 'User updated successfully.');
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return $this->sendResponse(['user' => auth()->user()], 'User details');
    }
}
