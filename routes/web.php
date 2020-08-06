<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'author'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/article', 'ArticleController@index');


    Route::get('/category', 'CategoryController@index');
    Route::get('/category/{id}/edit', 'CategoryController@edit');
    Route::get('/category/{id}/delete', 'CategoryController@delete');

    Route::post('/store-category', 'CategoryController@store')->name('storeCategory');
    Route::post('/update-category', 'CategoryController@update')->name('updateCategory');
});
