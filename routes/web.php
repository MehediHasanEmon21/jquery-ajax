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

Route::get('/ajax-crud','AjaxController@index');
Route::get('/get-data','AjaxController@getData')->name('getData');
Route::post('/store-data','AjaxController@storeData')->name('store.data');
Route::post('/update-data','AjaxController@update')->name('update.data');
Route::get('/ajax-crud/{id}/edit','AjaxController@edit');
Route::get('/ajax-crud/destroy/{id}','AjaxController@destroy');



