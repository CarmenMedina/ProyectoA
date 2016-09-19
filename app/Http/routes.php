<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login', [
    'uses' => 'UserController@getLogin',
    'as'   => 'login'
]);

Route::post('login', 'UserController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

Route::group(['Middleware' => 'Rol:admin'], function (){

    Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'home'
    ]);
});
