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

// Auth Routes
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::post('/password/forgot', 'AuthController@requestReset');
Route::get('/password/reset/{token}', 'AuthController@findResetToken');
Route::post('/password/reset', 'AuthController@resetPassword');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'data'], function() {
    Route::get('countries', 'DataController@countries');
    Route::get('states/{id}', 'DataController@states');
    Route::get('currencies', 'DataController@currencies');
});


Route::group(['middleware' => 'auth:api'], function(){  

    // Subscription Apis
    Route::get('user/subscription', 'SubscriptionController@userSubscription');
    Route::get('users/subscribe/{txref?}', "SubscriptionController@subscribeUser");
    Route::get('payment/subscription/{type}/{ref?}', 'PaymentContoller@create');

    // Transaction controller
    Route::get('/transactions', 'TransactionsController@index');
    
	// Auth Routes
    Route::post('/password/update', 'AuthController@updatePassword');
    Route::post('/logout', 'AuthController@logout');
    Route::get('/clear_session', 'AuthController@clear_session');
      
    // Invoice API Routes
    Route::post('invoice/create', 'InvoiceController@store');
    Route::put('invoice/update', 'InvoiceController@update');
    Route::delete('invoice/delete', 'InvoiceController@delete');
    Route::get('invoice/list', 'InvoiceController@list');
    Route::get('invoice/{id}', 'InvoiceController@view');
    Route::get('payment/invoice/{ref}', 'PaymentContoller@invoice'); //ref is the timestamp value of the created_at field

    // Client API Routes
    Route::post('client/create', 'ClientController@store');
    Route::put('client/update', 'ClientController@update');
    Route::delete('client/delete', 'ClientController@delete');
    Route::get('client/list', 'ClientController@list');
    Route::get('client/{id}', 'ClientController@view');

    // Project API Routes
    Route::resource('projects', 'ProjectController');
    Route::post('projects/{project}/collaborators', 'ProjectController@addCollaborator');
    Route::get('projects/{project}/collaborators', 'ProjectController@collaborators');
    Route::delete('projects/{project}/collaborators/{user}', 'ProjectController@deleteCollaborator');

    // Estimate API routes
    Route::get('estimates/{project}','EstimateController@show');
    Route::post('estimates','EstimateController@store');
    Route::put('estimates/{estimate}','EstimateController@update');
    Route::delete('estimates/{estimate}','EstimateController@destroy');

    
});

// Task API routes
Route::get('tasks/{project}','TaskController@index');
Route::get('tasks/detail/{task}','TaskController@show');
Route::post('tasks','TaskController@store');
Route::put('tasks/{task}','TaskController@update');
Route::delete('tasks/{task}','TaskController@destroy');
Route::post('tasks/{task}/team', 'TaskController@addTeam');
Route::get('tasks/{task}/team', 'TaskController@team');

// Template API routes
Route::resource('templates', 'TemplateController');

// Document API routes
Route::resource('documents', 'DocumentController');

Route::get('documents','DocumentsController@index');
Route::get('documents/{id}','DocumentsController@show');
Route::post('documents','DocumentsController@store');
Route::put('documents/{document}','DocumentsController@update');
Route::delete('documents/{document}','DocumentsController@destroy');

Route::get('subscription/plans', 'SubscriptionController@getPlans');

Route::get('contact-messages','ContactMessageController@index');
Route::get('contact-messages/{id}','ContactMessageController@show');
Route::post('contact-messaget/create', 'ContactMessageController@store');
