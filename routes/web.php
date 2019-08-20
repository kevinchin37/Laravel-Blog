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

Route::get('admin', 'AdminPostController@index');
Route::get('admin/posts', 'AdminPostController@postIndex');
Route::get('admin/posts/create', 'AdminPostController@create');
// Route::get('admin/posts{post}', 'AdminPostController@show');
Route::get('admin/posts/{post}/edit', 'AdminPostController@edit');
Route::post('admin/posts', 'AdminPostController@store');
Route::patch('admin/posts/{post}', 'AdminPostController@update');
Route::delete('admin/posts/{post}', 'AdminPostController@destroy');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
