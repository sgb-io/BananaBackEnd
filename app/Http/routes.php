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

Route::get('/', function() {
   return View::make('index');
});

Route::get('/orders', ['uses' => 'OrderController@index']);
Route::post('/orders', ['uses' => 'OrderController@store']);
Route::get('/orders/{id}', ['uses' => 'OrderController@show']);
Route::put('/orders/{id}', ['uses' => 'OrderController@update']);
Route::delete('/orders/{id}', ['uses' => 'OrderController@destroy']);

Route::get('/sweeties', ['uses' => 'SweetyController@index']);
Route::post('/sweeties', ['uses' => 'SweetyController@store']);
Route::get('/sweeties/{id}', ['uses' => 'SweetyController@show']);
Route::put('/sweeties/{id}', ['uses' => 'SweetyController@update']);
Route::delete('/sweeties/{id}', ['uses' => 'SweetyController@destroy']);
