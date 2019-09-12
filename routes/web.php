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

Route::group(['namespace' => 'Admin'], function () {
    // Post
    Route::get('admin', 'PostController@index');
    Route::get('admin/posts', 'PostController@postIndex');
    Route::get('admin/posts/create', 'PostController@create');
    Route::get('admin/posts/{post}/edit', 'PostController@edit');
    Route::post('admin/posts', 'PostController@store');
    Route::patch('admin/posts/{post}', 'PostController@update');
    Route::delete('admin/posts/{post}', 'PostController@destroy');

    // Category
    Route::get('admin/categories', 'CategoryController@index');
    Route::get('admin/categories/{category}', 'CategoryController@show');
    Route::post('admin/categories/', 'CategoryController@store');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
