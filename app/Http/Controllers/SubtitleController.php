<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\AmaraAPI;

/**
 * @group Subtitles
 *
 * APIs for retrieving subtitles
 */
class SubtitleController extends AppBaseController
{

    /**
     * Show Subtitle
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
