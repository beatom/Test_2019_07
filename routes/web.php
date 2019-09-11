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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'game'], function () {
        Route::post('/edit', 'GameController@edit')->name('game.edit');
        Route::post('/make', 'GameController@make')->name('game.make');
        Route::post('/history', 'GameController@history')->name('game.history');
        Route::get('/{link}', 'GameController@index')->name('game');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'can:admin-panel'], function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');
        Route::post('/edit/{id}', 'AdminController@edit')->name('admin.edit');
        Route::get('/edit/{id}', 'AdminController@show')->name('admin.show');
    });
    
});