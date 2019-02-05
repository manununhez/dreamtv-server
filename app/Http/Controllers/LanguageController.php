<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\AmaraAPI;

/**
 * @group Languages
 *
 * APIs for retrieving languages
 */
class LanguageController extends AppBaseController
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

        return AppBaseController::sendResponse($languages, "");

    }

}
