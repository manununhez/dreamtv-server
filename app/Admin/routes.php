<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
	$router->resource('errors', ErrorReasonController::class);
	$router->resource('users', UserController::class);
	$router->resource('usertask/errors', UserTaskErrorController::class);
	$router->resource('usertasks', UserTaskController::class);
	$router->resource('usertask/list', UserListTaskController::class);
	$router->resource('videos', VideoController::class);
	$router->resource('videotests', VideoTestController::class);
	$router->resource('categories/keywords', CategoryKeywordController::class);
	$router->resource('categories', CategoryController::class);
	$router->resource('tasks', TaskController::class);
});
