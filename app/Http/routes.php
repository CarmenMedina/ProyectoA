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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('list', [
    'uses' => 'ListController@getList',
    'as' => 'list'
]);
Route::post('list', [
    'uses' => 'ListController@posList',
    'as' => 'list'
]);

Route::get('order/edit-order/{idPedido}', 'EditController@editOrder');
Route::put('order/edit-order/{idPedido}', 'EditController@updateOrder');

