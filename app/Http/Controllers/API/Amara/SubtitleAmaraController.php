<?php

namespace App\Http\Controllers\API\Amara;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
Use App\AmaraAPI;
use Validator;


/**
 * @group Subtitles
 *
 * APIs for retrieving subtitles
 */
class SubtitleAmaraController extends BaseController
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'video_id' => 'required|string',
            'language_code' => 'required|string',
            'version' => 'required|integer',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $API = new AmaraAPI();
        $r = $request->all();

        $subtitle = $API->getSubtitle($r);

        return $this->sendResponse($subtitle, "Subtitle retrieved.");             
    }

}
