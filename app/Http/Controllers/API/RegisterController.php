<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $user = User::create([
            'email' => $input['email'],
            'password' => bcrypt($input['password'])
        ]);
        
        $success['token'] =  $user->createToken('DreamTv')->accessToken;

        return $this->sendResponse($success, 'User register successfully.');
    }

}
