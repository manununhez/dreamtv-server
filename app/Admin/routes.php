<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

	$router->get('/', 'HomeController@index');
	$router->resource('db/useraccounts','UserAccountAdminController');
	$router->resource('db/tasks','TaskAdminController');
	$router->resource('db/reasons','ReasonAdminController');
	$router->resource('db/usertasks','UserTaskAdminController');
	$router->resource('db/uservideoslists','UserVideosListAdminController');
	$router->resource('db/videotests','VideoTestsAdminController');
	$router->resource('db/videos','VideoAdminController');
});
