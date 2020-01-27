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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gweinyddu', 'TimelineController@index');
Route::get('/gweinyddu/golygu/{id}', 'TimelineController@edit');
Route::get('/gweinyddu/uchwanegu', 'TimelineController@create');
Route::get('/gweinyddu/dileu/{id}', 'TimelineController@destroy');
Route::post('/gweinyddu/uchwanegu', 'TimelineController@store');
Route::post('/gweinyddu/golygu/{id}', 'TimelineController@update');
Route::post('upload', 'FileController@upload')->name('upload');
