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

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){
        Route::get('index', 'PostController@index')->name('post.index');
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('store', 'PostController@store')->name('post.store');
});

Route::get('/mypage', 'MypageController@index')->name('mypage')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
