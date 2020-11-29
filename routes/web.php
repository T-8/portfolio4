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

Route::get('index', 'PostController@index')->name('post.index');
Route::get('show/{id}', 'PostController@show')->name('post.show');
Route::get('no_auth_show/{id}', 'PostController@no_auth_show')->name('post.no_auth_show');

Route::group(['prefix' => 'post', 'middleware' => 'auth'], function(){
        Route::get('create', 'PostController@create')->name('post.create');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('update/{id}', 'PostController@update')->name('post.update');
        Route::get('destroy/{id}', 'PostController@destroy')->name('post.destroy');
});

Route::get('profile-edit/{id}', 'MypageController@edit')->name('profile-edit')->middleware('auth');
Route::post('profile-update/{id}', 'MypageController@update')->name('profile-update')->middleware('auth');
Route::get('userpage/{id}', 'MypageController@show')->name('userpage')->middleware('auth');

Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function(){
  Route::get('create/{id}', 'CommentController@create')->name('comment.create');
  Route::post('store/{id}', 'CommentController@store')->name('comment.store');
  Route::get('destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
