<?php

use Illuminate\Http\Request;
use App\AmaraAPI;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ReasonController
Route::get('/reasons', 'ReasonApiController@index');
Route::post('/reasons', 'ReasonApiController@store');

// VideoApiController
Route::get('/videos', 'VideoApiController@index');
Route::get('/videos/info', 'VideoApiController@show');

// UserAccountController
Route::get('/users', 'UserAccountApiController@index');
Route::post('/users', 'UserAccountApiController@store');
Route::put('/users', 'UserAccountApiController@update');

// UserVideosListApiController
Route::get('/users/videos', 'UserVideosListApiController@index');
Route::post('/users/videos', 'UserVideosListApiController@store');
Route::delete('/users/videos', 'UserVideosListApiController@destroy');
Route::get('/users/videos/info', 'UserVideosListApiController@show');

// LanguageController
Route::get('/languages', 'LanguageController@index');

// SubtitleController
Route::get('/subtitle/info', 'SubtitleController@show');

// UserTaskApiController
Route::get('/users/task', 'UserTaskApiController@index');
Route::post('/users/task', 'UserTaskApiController@store');

// TaskApiController
Route::get('/tasks', 'TaskApiController@index');
Route::post('/tasks/backup','TaskApiController@saveTasksFromAmara');
Route::post('/tasks/backup/test','TaskApiController@saveTestTasksFromAmara');

