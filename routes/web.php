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


Route::get('/minusOne', 'ItemController@minusOne');
Route::get('/minusAll/{id}', 'ItemController@minusAll');
Route::get('/toDatabase', 'ItemController@toDatabase');


Route::post('/giveName', 'ItemController@giveName');
Route::get('/categories', 'CategoryController@categories');
Route::get('/item/{id}', 'CategoryController@show');
/**item index, a specific item, item add, item remove, get the suitcase now(so the items update) */    
Route::get('/item', 'ItemController@index');
Route::get('/minusOne/{id}', [
    'uses' => 'ItemController@minusOne',
    'as' => 'suitcase.minusItem'
]);
Route::get('/minusAll/{id}', [
    'uses' => 'ItemController@minusAll',
    'as' => 'suitcase.remove'
]);
Route::get('/increaseWeight',[
    'uses' => 'ItemController@increaseWeight',
    'as' => 'suitcase.increaseWeight'
]);
Route::get('/toDatabase',[
    'uses' => 'ItemController@toDatabase',
    'as' => 'suitcase.toDatabase'
]);
Route::get('/decreaseWeight',[
    'uses' => 'ItemController@decreaseWeight',
    'as' => 'suitcase.decreaseWeight'
]);
Route::get('/show/{id}', 'ItemController@show');
Route::get('/retrieve', 'ItemController@retrieve');
Route::get('/item/add/{id}', [
    'uses'=>'ItemController@addItem',
    'as'=>'item.add'
    ]);
Route::get('/items/suitcase', 'ItemController@retrieve');
