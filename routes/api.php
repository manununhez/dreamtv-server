<?php

use Illuminate\Http\Request;
use App\AmaraAPI;
use App\Http\Controllers;


// ReasonController
Route::get('/reasons', 'ReasonController@index');
Route::post('/reasons', 'ReasonController@store');

// VideoApiController
Route::get('/videos', 'VideoController@index');
Route::get('/videos/info', 'VideoController@show');

// UserAccountController
Route::get('/users', 'UserAccountController@index');
Route::post('/users', 'UserAccountController@store');
Route::put('/users', 'UserAccountController@update');

// UserVideosListApiController
Route::get('/users/videos', 'UserVideosListController@index');
Route::post('/users/videos', 'UserVideosListController@store');
Route::delete('/users/videos', 'UserVideosListController@destroy');
Route::get('/users/videos/info', 'UserVideosListController@show');

// LanguageController
Route::get('/languages', 'LanguageController@index');

// SubtitleController
Route::get('/subtitle/info', 'SubtitleController@show');

// UserTaskApiController
Route::get('/users/task', 'UserTaskController@index');
Route::post('/users/task', 'UserTaskController@store');

// TaskApiController
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/backup','TaskController@saveTasksFromAmara');
Route::get('/tasks/backup/test','TaskController@saveTestTasksFromAmara');

