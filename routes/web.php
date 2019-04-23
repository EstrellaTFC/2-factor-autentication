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
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/fff', 'Test@index');

Route::get('/addaccount', 'AccountController@newAccount');

Route::get('/allaccount', 'AccountController@allaccount');

Route::get('/deposit', 'AccountController@deposit');

Route::get('/transfer', 'AccountController@transfer');

Route::get('/withdraw', 'AccountController@withdraw');

Route::post('/add_account', 'AccountController@add_account')->name('add_account');

Route::post('/deposit_form', 'AccountController@deposit_form');

Route::post('/withdraw_form', 'AccountController@withdraw_form');

Route::post('/withdrawal', 'AccountController@withdrawal');

Route::post('/transferNow', 'AccountController@transferNow');

Route::post('/depositNow', 'AccountController@depositNow');

Route::post('/confirm_form', 'AccountController@confirm_form');

Route::post('/transfer_form', 'AccountController@transfer_form');

Route::post('/confirmtransfer', 'AccountController@confirmtransfer');

Route::post('/confirmQR', 'AccountController@confirmQR')->name('confirmQR');

Route::get('mail','HomeController@myTestMail');

Route::get('confirm','HomeController@confirm');





