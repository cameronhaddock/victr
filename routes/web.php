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
    return view('home');
});



Route::group(['prefix'=>'repositories','as'=>'repositories.'],function(){
   Route::get('/','RepositoriesController@index')->name('index');
   Route::get('fetch','RepositoriesController@fetch')->name('fetch');
   Route::post('save','RepositoriesController@save')->name('save');
   Route::get('{repository}','RepositoriesController@show')->name('show');
});
