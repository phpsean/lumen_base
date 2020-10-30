<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// 生成key
$router->get('/key', function () use ($router) {
    return \Illuminate\Support\Str::random(32);
});

$router->group([
    'namespace' => 'Web',
    'prefix'    => '/api',
], function () use ($router) {
    $router->get('/', 'IndexController@index');
});
