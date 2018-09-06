<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\AmaraAPI;

/**
 * @resource Language
 *
 * Longer description
 */

class LanguageController extends AppBaseController
{

    /**
     * Get languages from Amara
     *
     * Get all languages options availables in Amara (Amara API)
     */
    public function index()
    {
        $API = new AmaraAPI();
        $languages = $API->getLanguages();

        return AppBaseController::sendResponse($languages, "");

        // return response()->json($languages;

    }

}
