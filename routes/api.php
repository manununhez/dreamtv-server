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

		# usertask/errors
		Route::get('usertask/errors','API\UserTaskErrorController@index');
		Route::get('usertask/errors/{id}','API\UserTaskErrorController@show');
		Route::post('usertask/errors','API\UserTaskErrorController@store');
		Route::put('usertask/errors','API\UserTaskErrorController@update');
		Route::delete('usertask/errors','API\UserTaskErrorController@destroy');
	
		# usertasks
		Route::get('usertasks/details','API\UserTaskController@userTasksErrorsDetails');
		Route::get('usertasks','API\UserTaskController@index');
		Route::get('usertasks/{id}','API\UserTaskController@show');
		Route::post('usertasks','API\UserTaskController@store');
		Route::put('usertasks','API\UserTaskController@update');
		Route::delete('usertasks/{id}','API\UserTaskController@destroy');

		#Videos
		Route::resource('videos', 'API\VideoController');
	    
	    #VideoTests
	    Route::resource('videotests','API\VideoTestController');
	    
	    #Errors
	    Route::resource('errors','API\ErrorReasonController');


	    # usertask/list
		Route::get('usertask/list','API\UserListTaskController@index');
		Route::get('usertask/list/{id}','API\UserListTaskController@show');
		Route::post('usertask/list','API\UserListTaskController@store');
		Route::put('usertask/list','API\UserListTaskController@update');
		Route::delete('usertask/list','API\UserListTaskController@destroy');

		#tasks
		Route::get('tasks/categories','API\TaskController@tasksByCategories');
		Route::get('tasks','API\TaskController@index');
		Route::get('tasks/{id}','API\TaskController@show');
		Route::post('tasks','API\TaskController@store');
		Route::put('tasks','API\TaskController@update');
		Route::delete('tasks','API\TaskController@destroy');
		
	});
});
