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


#store
/*
index
add Store
edit Store
delete Store
*/
Route::get('/store', 'StoreController@index');

Route::get('/add', 'StoreController@add');
Route::post('/add', 'StoreController@addProcess');

Route::get('/edit/{id}','StoreController@edit');
Route::put('/edit', 'StoreController@editProcess');

Route::delete('/store', 'StoreController@deleteProcess');

#menu
/*
index
add Menu
edit Menu
delete Menu
*/
Route::get('/menu/{id}', 'MenuController@index');

Route::get('/addMenu/{id}', 'MenuController@add');
Route::post('/addMenu', 'MenuController@addProcess');

Route::get('/editMenu/{id}','MenuController@edit');
Route::put('/editMenu', 'MenuController@editProcess');

Route::delete('/delete', 'MenuController@deleteProcess');

#boarder
/*
index
create order
add order
delete order
delete boarder
*/
Route::get('/', 'BoardController@index');

Route::get('/create', 'BoardController@create');
Route::post('/create', 'BoardController@createProcess');

Route::get('/addOrder/{id}', 'BoardController@addOrder');
Route::post('/addOrder', 'BoardController@addOrderProcess');

Route::get('/deleteOrder/{id}', 'BoardController@deleteOrder');
Route::post('/deleteOrder', 'BoardController@deleteOrderProcess');

Route::get('/delete/{id}', 'BoardController@deleteIndex');

Auth::routes();

