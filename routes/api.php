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

Route::get('country', 'CountryController@country');

Route::get('state', 'StateController@state');

Route::get('currency', 'CurrencyController@currency');

Route::get('tasks','TaskController@getAllTasks');
Route::get('tasks/{id}', 'TaskController@getTask');
Route::post('tasks', 'TaskController@createTask');
Route::put('tasks/{id}', 'TaskController@updateTask');
Route::delete('tasks/{id}','TaskController@deleteTask');

Route::group(['middleware' => 'auth:api'], function(){    
    // Invoice API Routes
    Route::post('invoice/create', 'InvoiceController@store');
    Route::put('invoice/update', 'InvoiceController@update');
    Route::delete('invoice/delete', 'InvoiceController@delete');
    Route::get('invoice/list', 'InvoiceController@list');
    Route::get('invoice/{id}', 'InvoiceController@view');

    // Client API Routes
    Route::post('client/create', 'ClientController@store');
    Route::put('client/update', 'ClientController@update');
    Route::delete('client/delete', 'ClientController@delete');
    Route::get('client/list', 'ClientController@list');
    Route::get('client/{id}', 'ClientController@view');
});
Route::get('documents','DocumentsController@index');
Route::get('documents/{id}','DocumentsController@show');
Route::post('documents','DocumentsController@store');
Route::put('documents/{document}','DocumentsController@update');
Route::delete('documents/{document}','DocumentsController@destroy');

Route::resource('projects', 'ProjectController');

Route::get('contact-messages','ContactMessageController@index');
Route::get('contact-messages/{id}','ContactMessageController@show');
Route::post('contact-messaget/create', 'ContactMessageController@store');