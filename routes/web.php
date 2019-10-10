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

Route::post('/users/edit/profile',"ProfileController@editProfile")->middleware('auth')->name('edit-profile');

Route::get('/users/subscriptions',"SubscriptionController@showSubscriptions")->middleware('auth')->name('subscriptions');

Route::get('/users/subscriptions/{planId}',"SubscriptionController@subscribeUser")->middleware('auth');

Route::get('/users/view/subscriptions',"SubscriptionController@showPlan")->middleware('auth');


