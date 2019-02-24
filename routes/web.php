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

Route::get('/webhooks/events', 'EventController@index');
Route::get('/webhooks/answer', 'AnswerController@index');
Route::post('/webhooks/dtmf', 'DTMFController@index');

Route::get('/', function (){
    dd(url('/'));
    dd(env('APP_URL'));
});

Route::get('/', 'DashboardController@index');

Route::get('/notification', 'NotificationController@test');
Route::get('/paymentSuccess', 'NotificationController@sendPaymentSuccessfulNotification');

Route::get('/invoice', 'InvoiceController@test');
Route::get('/invoiceCallback', 'InvoiceController@invoiceCallback');

