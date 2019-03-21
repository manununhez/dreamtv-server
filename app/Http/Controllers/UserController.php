<?php

namespace App\Http\Controllers;

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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();


        return $this->sendResponse($users->toArray(), 'Users retrieved successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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


        $user->audio_language = $request['audio_language'];     
        $user->interface_mode = $request['interface_mode']; 
        $user->interface_language = $request['interface_language']; 
        $user->sub_language = $request['sub_language']; 
        $user->save();


        return $this->sendResponse($user->toArray(), 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return $this->sendResponse($product->toArray(), 'Product deleted successfully.');
    }

    /**
     * Update user
     *
     * Update the specified resource in storage.
     *
     * Parameters => audio_language (text, nullable), interface_mode (text, nullable), interface_language (text, nullable), sub_language (text, nullable)
     *
     * Requires user token - header 'Authorization'
     */
    // public function update(Request $request)
    // {
    //     $user = UserAccount::where('token', '=' ,$request->header('Authorization'))
    //             ->first();

    //     if($user !== null)
    //     {
    //         try {
    //             if(isset($request['audio_language']))
    //                 $user->audio_language = $request['audio_language']; 
                
    //             if(isset($request['interface_mode']))
    //                 $user->interface_mode = $request['interface_mode']; 

    //             if(isset($request['interface_language']))
    //                 $user->interface_language = $request['interface_language']; 

    //             if(isset($request['sub_language']))
    //                 $user->sub_language = $request['sub_language']; 
                

    //             $user->save();

    //             return AppBaseController::sendResponse($user, "User account updated correctly.");
            
    //         } catch(QueryException $e) {
    //                 return AppBaseController::sendError($e->getMessage());
    //         }
    //     }
    //     else
    //         return AppBaseController::sendError("User not found.");
    // }


    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return return $this->sendResponse(['user' => auth()->user()], 'User details');
    }
}
