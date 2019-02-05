<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\QueryException;
use App\Models\UserAccount;
use App\Models\Task;
use App\Models\Video;
Use App\AmaraAPI;


/**
 * @group User account
 *
 * APIs for retrieving users account
 */
class UserAccountController extends AppBaseController
{
    /**
     * Get all user accounts
     *
     * Display a listing of the resource.
     *
     * Requires user token - header 'Authorization'
     */
    public function index(Request $request)
    {

        $users = UserAccount::all();
       
        return AppBaseController::sendResponse($users, "");
    }

    
    /**
     * Create user account
     *
     * Store a newly created resource in storage.
     *
     * Parameters => name (text, mandatory), type (text, mandatory), interface_mode (text, nullable, default: "beginner"), interface_language (text, nullable, default: "pl"), sub_language (text, nullable, default: All languages), audio_language (text, nullable, default: All languages)
     *
     * Requires user token - header 'Authorization'
     */
    public function store(Request $request)
    {
        $r = $request->all();
        $users = UserAccount::where('name', '=' ,$r['name'])->first();
        
        if($users === null)
        {   
            try {
                $users = new UserAccount();
                $users->name = $r['name'];
                $users->type = $r['type'];
                $users->interface_mode = isset($r['interface_mode']) ? $r['interface_mode'] : "beginner"; //DEfault beginner
                $users->interface_language = isset($r['interface_language']) ? $r['interface_language'] : "pl"; //DEfault polish
                $users->token = 'Bearer '.bcrypt($r['name']);
                $users->sub_language = isset($r['sub_language']) ? $r['sub_language'] : "NN";
                $users->audio_language = isset($r['audio_language']) ? $r['audio_language'] : "NN";
                $users->save();
            
            } catch(QueryException $e) {
                return AppBaseController::sendError($e->getMessage());
            }
        }

        return AppBaseController::sendResponse($users, "User account created correctly.");
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
    public function update(Request $request)
    {
        $user = UserAccount::where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            try {
                if(isset($request['audio_language']))
                    $user->audio_language = $request['audio_language']; 
                
                if(isset($request['interface_mode']))
                    $user->interface_mode = $request['interface_mode']; 

                if(isset($request['interface_language']))
                    $user->interface_language = $request['interface_language']; 

                if(isset($request['sub_language']))
                    $user->sub_language = $request['sub_language']; 
                

                $user->save();

                return AppBaseController::sendResponse($user, "User account updated correctly.");
            
            } catch(QueryException $e) {
                    return AppBaseController::sendError($e->getMessage());
            }
        }
        else
            return AppBaseController::sendError("User not found.");
    }
   
}
