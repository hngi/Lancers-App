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

Route::get('/users/subscriptions',"SubscriptionController@showSubscriptions")->name('subscriptions');

Route::get('/users/subscribe/{txref?}',"SubscriptionController@subscribeUser");

Route::get('/users/view/subscriptions',"SubscriptionController@showPlan");


Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');

Route::get('payment/{type}/{ref?}', 'PaymentContoller@create');

Route::resource('transactions', 'TransactionsController');

Route::get('countries', 'DataController@countries');

Route::get('states/{id}', 'DataController@states');

Route::get('currencies', 'DataController@currencies');

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

Route::get('user/notifications', 'NotificationsController@notifications');
Route::put('user/notifications/read/{$id}', 'NotificationsController@markAsRead');
Route::put('user/notifications/read/all', 'NotificationsController@markAllAsRead');

