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

Route::get('/home', 'HomeController@index');
Route::post('/home','HomeController@postindex');
Route::get('delete/{id}', 'HomeController@getDelete');
Route::get('edit/{id}', 'HomeController@getEdit');
Route::post('edit/{id}', 'HomeController@postEdit');
