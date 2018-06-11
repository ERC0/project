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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('occupations', 'OccupationController@index');
Route::post('occupations', 'OccupationController@store')->name('occupations');
Route::get('occupations/create', 'OccupationController@create');

Route::get('apply', 'HomeController@applyTax');
Route::get('invoice', 'HomeController@getInvoice');

Route::get('tax/all', 'TransactionController@index');
Route::get('tax', 'TransactionController@create');
Route::post('tax/create', 'TransactionController@store');
Route::get('tax/verify/{id}', 'TransactionController@taxVerify')->name('tax/verify');

Route::get('{username}/tax/{id}/payment', 'TransactionController@payment')->name('tax/payment');

Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
