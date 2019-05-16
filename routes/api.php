<?php

Route::group(['middleware' => ['json.response']], function () {
	// AMARA
	Route::get('amara/languages', 'API\Amara\LanguageAmaraController@index');
	Route::get('amara/videos', 'API\Amara\VideoAmaraController@index');
	Route::get('amara/video', 'API\Amara\VideoAmaraController@show');
	Route::get('amara/subtitle', 'API\Amara\SubtitleAmaraController@show');

	// Backup
	Route::get('backup','API\Amara\BackupVideosController@saveTasksFromAmara');
	Route::get('backup/test','API\Amara\BackupVideosController@saveTestTasksFromAmara');

	// DREAM SERVER
	Route::post('login', 'API\AuthController@login');
	Route::post('register', 'API\AuthController@register');
	Route::delete('remove', 'API\AuthController@destroy');

	Route::middleware('auth:api')->group(function () {
	    Route::get('details', 'API\AuthController@details');
	    
	    Route::put('user', 'API\UserController@update');

		Route::get('usertasks','API\UserTaskController@userTasksErrorsDetails');

		Route::delete('usertask/list','API\UserListTaskController@deleteByTask');

		Route::get('tasks','API\TaskController@tasksByCategories');

		Route::get('usertask/errors','API\UserTaskErrorController@index');
		Route::post('usertask/errors','API\UserTaskErrorController@store');
		Route::put('usertask/errors','API\UserTaskErrorController@update');

		
		Route::resource('resource/videos', 'API\VideoController');
	    
	    Route::resource('resource/videotests','API\VideoTestController');
	    
	    Route::resource('resource/errors','API\ErrorReasonController');
		
		Route::resource('resource/tasks','API\TaskController');
		
		Route::resource('resource/usertask/list', 'API\UserListTaskController');
		
		Route::resource('resource/usertasks', 'API\UserTaskController');
		
		Route::resource('resource/usertask/errors','API\UserTaskErrorController');

		
	});
});
