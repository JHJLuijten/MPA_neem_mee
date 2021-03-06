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
Route::view('/', 'home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/home', 'ItemController@items');
Route::get('/categories', 'CategoryController@categories');
Route::get('/item/{id}', 'CategoryController@item');
Route::get('/item', 'ItemController@index');
Route::get('/show/{id}', 'ItemController@show');
Route::get('/item/add/{id}', [
    'uses'=>'ItemController@addItem',
    'as'=>'item.add'
    ]);
Route::get('/items/suitcase', 'ItemController@getSuitcase');