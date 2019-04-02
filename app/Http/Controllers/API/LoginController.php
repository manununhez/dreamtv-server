<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class LoginController extends BaseController
{
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
            $success['token'] =  auth()->user()->createToken('DreamTv')->accessToken;
            return $this->sendResponse(["token" => $success['token']], 'Login successfully.');
        } else {
            return $this->sendError('Error', 'UnAuthorised', 401);
        }
    }

}
