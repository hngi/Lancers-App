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
Route::get('documents','DocumentsController@index');
Route::get('documents/{id}','DocumentsController@show');
Route::post('documents','DocumentsController@store');
Route::put('documents/{document}','DocumentsController@update');
Route::delete('documents/{document}','DocumentsController@destroy');