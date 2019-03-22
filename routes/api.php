<?php

// use Illuminate\Http\Request;
// use App\AmaraAPI;
// use App\Http\Controllers;


// ReasonController
// Route::get('/reasons', 'ReasonController@index');
// Route::post('/reasons', 'ReasonController@store');



// // UserAccountController
// Route::get('/users', 'UserAccountController@index');
// Route::post('/users', 'UserAccountController@store');
// Route::put('/users', 'UserAccountController@update');

// UserVideosListApiController
Route::get('/users/videos', 'UserVideosListController@index');
Route::post('/users/videos', 'UserVideosListController@store');
Route::delete('/users/videos', 'UserVideosListController@destroy');
Route::get('/users/video', 'UserVideosListController@show');


// UserTaskApiController
Route::get('/users/task', 'UserTaskController@index');
Route::post('/users/task', 'UserTaskController@store');

// TaskApiController
// Route::get('/tasks', 'TaskController@index');
Route::get('backup','BackupVideosController@saveTasksFromAmara');
Route::get('backup/test','BackupVideosController@saveTestTasksFromAmara');

//-----------------------------------------------------------
// AMARA
Route::get('amara/languages', 'API\Amara\LanguageAmaraController@index');

Route::get('amara/videos', 'API\Amara\VideoAmaraController@index');
Route::get('amara/video', 'API\Amara\VideoAmaraController@show');

Route::get('amara/subtitle', 'API\Amara\SubtitleAmaraController@show');


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
	Route::get('tasks/categories','API\TaskController@tasksByCategories');
});

