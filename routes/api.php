<?php

Route::group(['middleware' => ['json.response']], function () {
	// AMARA
	Route::get('amara/languages', 'API\Amara\LanguageAmaraController@index');
	Route::get('amara/videos', 'API\Amara\VideoAmaraController@index');
	Route::get('amara/video', 'API\Amara\VideoAmaraController@show');
	Route::get('amara/video/language', 'API\Amara\VideoAmaraController@getVideoLanguage');
	Route::get('amara/subtitle', 'API\Amara\SubtitleAmaraController@show');

	// Backup
	Route::get('backup','API\Amara\BackupVideosController@saveTasksFromAmara');
	Route::get('backup/test','API\Amara\BackupVideosController@saveTestTasksFromAmara');

	// DREAM SERVER
	Route::post('login', 'API\AuthController@login');
	Route::post('register', 'API\AuthController@register');
	Route::delete('remove', 'API\AuthController@delete');

	Route::middleware('auth:api')->group(function () {
	    Route::get('details', 'API\AuthController@details');
	    
	    Route::put('user', 'API\UserController@update');

		# usertask/errors
		Route::get('usertask/errors','API\UserTaskErrorController@index');
		Route::get('usertask/errors/{id}','API\UserTaskErrorController@show');
		Route::post('usertask/errors','API\UserTaskErrorController@store');
		Route::put('usertask/errors','API\UserTaskErrorController@update');
		Route::delete('usertask/errors','API\UserTaskErrorController@delete');
	
		# usertasks
		Route::get('usertasks/details','API\UserTaskController@userTasksErrorsDetails');
		Route::get('usertasks','API\UserTaskController@index');
		Route::get('usertasks/{id}','API\UserTaskController@show');
		Route::post('usertasks','API\UserTaskController@store');
		Route::put('usertasks','API\UserTaskController@update');
		Route::delete('usertasks/{id}','API\UserTaskController@delete');

		#Videos
		Route::get('videos','API\VideoController@index');
		Route::get('videos/{id}','API\VideoController@show');
		Route::post('videos','API\VideoController@store');
		Route::put('videos/{id}','API\VideoController@update');
		Route::delete('videos/{id}','API\VideoController@delete');
	    
	    #VideoTests
	    Route::get('videotests','API\VideoTestController@index');
		Route::get('videotests/{id}','API\VideoTestController@show');
		Route::post('videotests','API\VideoTestController@store');
		Route::put('videotests/{id}','API\VideoTestController@update');
		Route::delete('videotests/{id}','API\VideoTestController@delete');
	    
	    #Errors
		Route::get('errors','API\ErrorReasonController@index');
		Route::get('errors/{id}','API\ErrorReasonController@show');
		Route::post('errors','API\ErrorReasonController@store');
		Route::put('errors/{id}','API\ErrorReasonController@update');
		Route::delete('errors/{id}','API\ErrorReasonController@delete');

	    # usertask/list
		Route::get('usertask/list','API\UserListTaskController@index');
		Route::get('usertask/list/{id}','API\UserListTaskController@show');
		Route::post('usertask/list','API\UserListTaskController@store');
		Route::put('usertask/list','API\UserListTaskController@update');
		Route::delete('usertask/list','API\UserListTaskController@delete');

		#tasks
		Route::get('tasks/categories','API\TaskController@tasksByCategories');
		Route::get('tasks/search/category', 'API\TaskController@searchByCategory');
		Route::get('tasks/search','API\TaskController@searchByTerm');
		Route::get('tasks','API\TaskController@index');
		Route::get('tasks/{id}','API\TaskController@show');
		Route::post('tasks','API\TaskController@store');
		Route::put('tasks/{id}','API\TaskController@update');
		Route::delete('tasks/{id}','API\TaskController@delete');

		#Categories keywords
	    Route::get('categories/keywords','API\CategoryKeywordController@index');
		Route::get('categories/keywords/{id}','API\CategoryKeywordController@show');
		Route::post('categories/keywords','API\CategoryKeywordController@store');
		Route::put('categories/keywords','API\CategoryKeywordController@update');
		Route::delete('categories/keywords','API\CategoryKeywordController@delete');

		#Categories
	    Route::get('categories','API\CategoryController@categoriesByLanguage');
		Route::get('categories/{id}','API\CategoryController@show');
		Route::post('categories','API\CategoryController@store');
		Route::put('categories/{id}','API\CategoryController@update');
		Route::delete('categories/{id}','API\CategoryController@delete');

	});
});
