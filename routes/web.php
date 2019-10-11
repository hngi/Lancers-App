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
    return view('index');
});
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

