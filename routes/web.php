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
Auth::routes();


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::resource('user', 'UserController')->middleware('auth');

Route::get('/pdf','HomeController@generatePDF');

Route::get('/voyages/wait','VoyageController@wait')->middleware('auth');

Route::get('/voyages/{id}','VoyageController@view')->where('id', '[0-9]+')->name('waitvoyage')->middleware('auth');

Route::get('/voyages/accept/{id}','VoyageController@accept')->where('id', '[0-9]+')->name('acceptvoyage')->middleware('auth');

Route::get('/voyages/refuse/{id}','VoyageController@refuse')->where('id', '[0-9]+')->name('refusevoyage')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'LogoutController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
