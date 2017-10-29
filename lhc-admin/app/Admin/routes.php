<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index');
    $router->get('/buylist', 'BuyListController@index');
    $router->get('/touzhu', 'TouzhuController@index');
    $router->post('/touzhu/touzhuing', 'TouzhuController@touzhuing');
});
