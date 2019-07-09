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
            'interface_mode' => 'required|string',
            'sub_language' => 'required|string',
            'audio_language' => 'required|string'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

	    $user = auth()->user();
        $user->audio_language = $request['audio_language'];     
        $user->interface_mode = $request['interface_mode']; 
        $user->sub_language = $request['sub_language']; 
        $updated = $user->save();

        if($updated)
            return $this->sendResponse($user->toArray(), 'User updated successfully.');
        else
            return $this->sendError('User could not be updated.', 500);
    }


}
