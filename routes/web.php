<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::post('/users/edit/profile', "ProfileController@editProfile")->middleware('auth')->name('edit-profile');

Route::get('/users/subscriptions', "SubscriptionController@showSubscriptions")->middleware('auth')->name('subscriptions');

Route::get('/users/subscriptions/{planId}', "SubscriptionController@subscribeUser")->middleware('auth');

Route::get('/users/view/subscriptions', "SubscriptionController@showPlan")->middleware('auth');

Route::get('/users/settings/emails', "emailsettingsController@index")->middleware('auth');

Route::put('/users/settings/emails', "emailsettingsController@updateEmailSettings")->middleware('auth')->name('SET-EMAIL');




Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');

Route::get('/transactions', 'TransactionsController@index')->middleware('auth');
Route::post('/transactions/add', 'TransactionsController@store')->middleware('auth');
Route::get('/transactions/{id}', 'TransactionsController@show')->middleware('auth');
Route::post('/transactions/delete/{id}', 'TransactionsController@destroy')->middleware('auth');

Route::get('country', 'CountryController@country');

Route::get('state', 'StateController@state');

Route::get('currency', 'CurrencyController@currency');

Route::get('tasks', 'TaskController@getAllTasks')->middleware('auth');
Route::get('tasks/{id}', 'TaskController@getTask')->middleware('auth');
Route::post('tasks', 'TaskController@createTask')->middleware('auth');
Route::put('tasks/{id}', 'TaskController@updateTask')->middleware('auth');
Route::delete('tasks/{id}', 'TaskController@deleteTask')->middleware('auth');

Route::get('estimates', 'EstimateController@index')->middleware('auth');
Route::get('estimates/{estimate}', 'EstimateController@show')->middleware('auth');
Route::post('estimates', 'EstimateController@store')->middleware('auth');
Route::put('estimates/{estimate}', 'EstimateController@update')->middleware('auth');
Route::delete('estimates/{estimate}', 'EstimateController@destroy')->middleware('auth');
