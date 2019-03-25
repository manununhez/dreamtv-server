<?php

// UserVideosListApiController
Route::get('/users/videos', 'UserVideosListController@index');
Route::post('/users/videos', 'UserVideosListController@store');
Route::delete('/users/videos', 'UserVideosListController@destroy');
Route::get('/users/video', 'UserVideosListController@show');


// UserTaskApiController
Route::get('/users/task', 'UserTaskController@index');
Route::post('/users/task', 'UserTaskController@store');

//-----------------------------------------------------------
// AMARA
Route::get('amara/languages', 'API\Amara\LanguageAmaraController@index');
Route::get('amara/videos', 'API\Amara\VideoAmaraController@index');
Route::get('amara/video', 'API\Amara\VideoAmaraController@show');
Route::get('amara/subtitle', 'API\Amara\SubtitleAmaraController@show');


// Backup
Route::get('backup','BackupVideosController@saveTasksFromAmara');
Route::get('backup/test','BackupVideosController@saveTestTasksFromAmara');


// DREAM SERVER
Route::post('login', 'API\LoginController@login');
Route::post('register', 'API\RegisterController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'API\UserController@details');
    Route::put('user', 'API\UserController@update');
    Route::resource('products', 'API\ProductController');
    Route::resource('videos', 'API\VideoController');
    Route::resource('videotests','API\VideoTestController');
    Route::resource('errors','API\ErrorReasonController');
	Route::resource('tasks','API\TaskController');
	Route::get('task/categories','API\TaskController@tasksByCategories');
	Route::resource('user/videos', 'API\UserVideoController');
});

