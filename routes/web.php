<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'StoreController@index');

#store
Route::get('/add', 'StoreController@add');
Route::post('/add','StoreController@addPocess');

Route::get('/edit/{id}','StoreController@edit');
Route::put('/edit', 'StoreController@editProcess');

Route::get('/store', 'StoreController@index');
Route::delete('/store', 'StoreController@deleteProcess');


#menu
Route::get('/menu/{id}', 'MenuController@index');

Route::get('/addMenu/{id}', 'MenuController@add');
Route::post('/addMenu', 'MenuController@addProcess');

Route::get('/editMenu/{id}','MenuController@edit');
Route::put('/editMenu', 'MenuController@editProcess');


Auth::routes();

