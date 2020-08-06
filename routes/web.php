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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index')->name('index');

Auth::routes([
    'register' => false,
    'forgot-password' => false
]);


Route::group(['prefix' => 'author', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    /* Article Route */
    Route::group(['prefix' => 'article'], function () {
        Route::get('/', 'ArticleController@index');
        Route::get('/{id}/edit', 'ArticleController@edit');
        Route::get('/{id}/delete', 'ArticleController@delete');

        Route::post('/store', 'ArticleController@store')->name('storeArticle');
        Route::post('/update', 'ArticleController@update')->name('updateArticle');
    });

    /* Category Route */
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/{id}/edit', 'CategoryController@edit');
        Route::get('/{id}/delete', 'CategoryController@delete');

        Route::post('/store', 'CategoryController@store')->name('storeCategory');
        Route::post('/update', 'CategoryController@update')->name('updateCategory');
    });
});
