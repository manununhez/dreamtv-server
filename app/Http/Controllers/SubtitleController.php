<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\AmaraAPI;

/**
 * @resource Subtitle
 *
 * Longer description
 */

class SubtitleController extends AppBaseController
{

    /**
     * Show Subtitle From Amara
     *
     * Show a specific subtitle according to Amara API.
     *
     * Parameter => video_id, language_code, format, version
     */
    public function show(Request $request)
    {
        $API = new AmaraAPI();
        $r = $request->all();

        $subtitle = $API->getSubtitle($r);

        return AppBaseController::sendResponse($subtitle, "");             
    }

}
