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

Route::get('/','HomeController@index');

Route::post('insertdata','HomeController@insertdata');
Route::post('updatedata','HomeController@updatedata');
Route::post('deletedata','HomeController@deletedata');
