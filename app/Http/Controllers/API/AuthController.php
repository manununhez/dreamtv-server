<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class AuthController extends BaseController
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


    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = Auth::user();

        return $this->sendResponse($user->toArray(), 'User details');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if (!$user) {
            return $this->sendError('User with id = '.$id.' not found.');
        }

        $deleted = $user->delete();


        if($deleted)
            return $this->sendResponse($user->toArray(), 'User'. $id .'deleted successfully.');
        else
            return $this->sendError('User could not be deleted');
    }

}
