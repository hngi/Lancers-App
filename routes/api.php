<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');

Route::get('/transactions', 'TransactionsController@index');
Route::post('/transactions/add', 'TransactionsController@store');
Route::get('/transactions/{id}', 'TransactionsController@show');
Route::post('/transactions/delete/{id}', 'TransactionsController@destroy');
