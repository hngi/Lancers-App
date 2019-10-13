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

Route::post('/contracts/{project_id}/{template_id}', 'ContractControler@store')->name('create.contract');
Route::put('/contracts/{project_id}/{id}')->name('edit.contract');
Route::delete('/contracts/{project_id}/{id}')->name('delete.contract');

Auth::routes();

Route::get('/pricing', function () {
    return view('pricing');
});



Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/dashboard/profile', 'ProfileController@index')->name('dashboard-profile');

Route::get('/dashboard/profile/view', 'ProfileController@userProfileDetails')->name('user-profile');


Route::post('/users/edit/profile', "ProfileController@editProfile")->middleware('auth')->name('edit-profile');

Route::get('/users/subscriptions', "SubscriptionController@showSubscriptions")->middleware('auth')->name('subscriptions');

Route::get('/users/subscriptions/{planId}', "SubscriptionController@subscribeUser")->middleware('auth');

Route::get('users/subscribe/{txref}', "SubscriptionController@subscribeUser");

Route::get('/users/view/subscriptions', "SubscriptionController@showPlan")->middleware('auth');

Route::get('/users/settings/emails', "emailsettingsController@index")->middleware('auth');

Route::put('/users/settings/emails', "emailsettingsController@updateEmailSettings")->middleware('auth')->name('SET-EMAIL');


Route::post('/users/edit/profile/image', "ProfileController@updateImage")->middleware('auth')->name('Profile-Image');





Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::post('/rave/callback', 'RaveController@callback')->name('callback');

Route::get('payment/{type}/{ref?}', 'PaymentContoller@create');

Route::resource('transactions', 'TransactionsController');

Route::get('countries', 'DataController@countries');

Route::get('states/{id}', 'DataController@states');

Route::get('currencies', 'DataController@currencies');

Route::get('tasks', 'TaskController@getAllTasks');
Route::get('tasks/{id}', 'TaskController@getTask');
Route::post('tasks', 'TaskController@createTask');
Route::put('tasks/{id}', 'TaskController@updateTask');
Route::delete('tasks/{id}', 'TaskController@deleteTask');
Route::put('/tasks/{task}/team', 'TaskController@addTeam');

Route::get('estimates', 'EstimateController@index')->middleware('auth');
Route::get('estimates/{estimate}', 'EstimateController@show')->middleware('auth');
Route::post('estimates', 'EstimateController@store')->middleware('auth');
Route::put('estimates/{estimate}', 'EstimateController@update')->middleware('auth');
Route::delete('estimates/{estimate}', 'EstimateController@destroy')->middleware('auth');

Route::get('user/notifications', 'NotificationsController@notifications');
Route::put('user/notifications/read/{$id}', 'NotificationsController@markAsRead');
Route::put('user/notifications/read/all', 'NotificationsController@markAllAsRead');

Route::get('/invoice_sent', function () {
    return view('invoice_sent');
});
Route::get('/invoice_view', function () {
    return view('invoice_view');
});
Route::get('/create_estimate', function () {
    return view('create_estimate');
});
Route::get('/set_estimate', function () {
    return view('set_estimate');
});



    Route::get('/transactions', 'TransactionsController@index');


Route::get('/invoice/pdf', function() {
    //return view('invoice_view_pdf');

    $pdf = PDF::loadView('invoice_view_pdf');  
    return $pdf->download('lancers_invoice.pdf');
});