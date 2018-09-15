<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

	$router->get('/', 'HomeController@index');
	$router->resource('useraccounts','UserAccountAdminController');
	$router->resource('tasks','TaskAdminController');
	$router->resource('reasons','ReasonAdminController');
	$router->resource('usertasks','UserTaskAdminController');
	$router->resource('uservideoslists','UserVideosListAdminController');
	$router->resource('videos','VideoAdminController');
});
