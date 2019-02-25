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

//Route::resource('/', 'user');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');



Route::get('/', 'HomeController@index')->name('home');

Route::get('caja', 'CajaController@index');

Route::post('caja', 'CajaController@getform');
Route::post('editA', 'CajaController@editA');
Route::get('caja/{num}', 'CajaController@getMesa');
Route::get('borrar/{id}', 'CajaController@destroy');
Route::get('editar/{id}', 'CajaController@edit');
Route::get('imprimir/{num}/{desc}', 'CajaController@imprimir');
Route::get('editMesa/{array}', 'CajaController@editMesa');

Route::get('cocina', 'CocinaController@index');
Route::get('master', 'MasterController@index');




