<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\ErrorReason;
Use App\Models\User;

class ErrorReasonController extends Controller
{
    /**
     * List of reasons
     *
     * This endpoint retrieves all reasons according to users interface language.
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
     * Create and save a newly created reason
     *
     * This endpoint create a specific reason.
     *
     * Parameters => name (text, mandatory), code (text, mandatory), language (text, mandatory)
     * 
     * Requires user token - header 'Authorization'
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
