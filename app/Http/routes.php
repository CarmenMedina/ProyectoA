<?php

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('order/newOrder','NewOrderController@getOrder');

Route::post('order/newOrder', 'NewOrderController@postOrder');