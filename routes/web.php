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
Route::get('/webhooks/answer', 'AnswerController@index')->name('answer');
Route::post('/webhooks/dtmf', 'DTMFController@index')->name('dtmf');

//Route::get('/', function (){
//    dd(\App\Action::first()->ncoo);
//    dd(route('dtmf', ['mf' => 'mfmf']));
//    dd(url('/'));
//    dd(env('APP_URL'));
//});

Route::get('/', 'DashboardController@index');

Route::get('/notification', 'NotificationController@test');
Route::get('/paymentSuccess', 'NotificationController@sendPaymentSuccessfulNotification');

Route::get('/invoice', 'InvoiceController@invoiceAuth');
Route::get('/setAccessToken', 'InvoiceController@setAccessToken');
Route::get('/tryCreate', 'InvoiceController@test');

