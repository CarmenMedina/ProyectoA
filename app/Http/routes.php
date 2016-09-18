<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('order/new-order', [
    'uses' => 'NewOrderController@getOrder',
    'as'   => 'order/new-order'
]);

Route::post('order/new-order', 'NewOrderController@postOrder');