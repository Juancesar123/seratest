<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::group([
    'prefix' => 'api',

], function ($router) {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');

});

Route::group([
    'prefix' => 'api',
    'middleware' => 'auth:api',
    'except' => ['login', 'refresh', 'logout','register']

], function ($router) {
    Route::post('profile/create','ProfileController@create');
    Route::get('profile','ProfileController@index');
    Route::put('profile/update/{id}','ProfileController@edit');
    Route::delete('profile/delete/{id}','ProfileController@delete');
    Route::post('user-profile', 'AuthController@me');

});
