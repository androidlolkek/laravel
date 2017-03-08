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
Route::get('/', 'BaseController@getIndex');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::post('/home','HomeController@postindex');
Route::get('delete/{id}', 'HomeController@getDelete');
Route::get('edit/{id}', 'HomeController@getEdit');
Route::post('edit/{id}', 'HomeController@postEdit');
Route::get('catalog/{id}', 'ProductController@getIndex');
Route::get('product/{id}', 'ProductController@getOne');
Route::get('order', 'OrderController@getIndex');
Route::post('order', 'OrderController@postIndex');