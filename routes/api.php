<?php

use Illuminate\Http\Request;
use App\AmaraAPI;
use App\Http\Controllers;

Route::apiResource('videotests','VideoTestsController');

// ReasonController
Route::get('/reasons', 'ReasonController@index');
Route::post('/reasons', 'ReasonController@store');



// // UserAccountController
// Route::get('/users', 'UserAccountController@index');
// Route::post('/users', 'UserAccountController@store');
// Route::put('/users', 'UserAccountController@update');

// UserVideosListApiController
Route::get('/users/videos', 'UserVideosListController@index');
Route::post('/users/videos', 'UserVideosListController@store');
Route::delete('/users/videos', 'UserVideosListController@destroy');
Route::get('/users/video', 'UserVideosListController@show');



// SubtitleController
Route::get('/subtitle', 'SubtitleController@show');

// UserTaskApiController
Route::get('/users/task', 'UserTaskController@index');
Route::post('/users/task', 'UserTaskController@store');

// TaskApiController
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/backup','TaskController@saveTasksFromAmara');
Route::get('/tasks/backup/test','TaskController@saveTestTasksFromAmara');

//-----------------------------------------------------------

Route::post('login', 'API\LoginController@login');
Route::post('register', 'API\RegisterController@register');

// LanguageController
Route::get('/languages', 'API\Amara\LanguageAmaraController@index');

// VideoApiController
Route::get('/videos', 'API\Amara\VideoAmaraController@index');
Route::get('/video', 'API\Amara\VideoAmaraController@show');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\UserController@details');
    Route::put('user', 'API\UserController@update');
    Route::resource('products', 'API\ProductController');
    Route::resource('videos', 'API\VideoController');
});

