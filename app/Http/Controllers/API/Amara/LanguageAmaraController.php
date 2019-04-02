<?php

namespace App\Http\Controllers\API\Amara;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
Use App\AmaraAPI;

/**
 * @group Languages
 *
 * APIs for retrieving languages
 */
class LanguageController extends BaseController
{

    /**
     * List of languages
     *
     * Get all languages options availables in Amara (Amara API)
     */
    public function index()
    {
        $API = new AmaraAPI();
        $languages = $API->getLanguages();

        return $this->sendResponse($languages, "Languages retrieved correctly.");

    }

}
