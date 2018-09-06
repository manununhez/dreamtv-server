<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Reason;
Use App\Models\UserAccount;


/**
 * @resource Reasons
 *
 * Longer description
 */

class ReasonApiController extends AppBaseController
{

    /**
     * Get all reasons
     *
     * This endpoint retrieves all reasons.
     * Order by code, ASC.
     * Get reasons according to language = user->interface_language
     * 
     * Requires user token - header 'Authorization'
     */
    public function index(Request $request)
    {
        $user = DB::table('userAccounts')
                ->select('userAccounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            $reasons = DB::table('reasons')
                    ->select('reasons.*')
                    ->where('language', '=' , $user->interface_language)
                    ->orderBy('code', 'ASC')
                    ->get();

            if($reasons === null)
                return AppBaseController::sendError("There are not available reasons.");
            else
                return AppBaseController::sendResponse($reasons, "");

        }
        else
            //return $request->header('Authorization');
            return AppBaseController::sendError("User not found.");
    }

    /**
     * Create reason
     *
     * This endpoint create a specific reason.
     *
     * Parameters => name (text, mandatory), code (text, mandatory), language (text, mandatory)
     * 
     * Requires user token - header 'Authorization'
     */
    public function store(Request $request)
    {
        $user = DB::table('userAccounts')
                ->select('userAccounts.*')
                ->where('token', '=' ,$request->header('Authorization'))
                ->first();

        if($user !== null)
        {
            try {
                $r = $request->all();
                $reason = new Reason();
                $reason->name = $r['name'];
                $reason->code = $r['code'];
                $reason->language = $r['language'];     
                $reason->save();

                return AppBaseController::sendResponse($reason, "Reason created correctly.");
            } catch(QueryException $e) {
                return AppBaseController::sendError($e->getMessage());
            }
        }
        else
            return AppBaseController::sendError("User not found.");
    }

}
