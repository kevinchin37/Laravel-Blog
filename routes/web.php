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

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Post
    Route::get('admin', 'PostController@index');
    Route::get('admin/posts', 'PostController@postIndex');
    Route::get('admin/posts/create', 'PostController@create')->middleware('role.admin');
    Route::get('admin/posts/{post}/edit', 'PostController@edit')->middleware('role.admin');
    Route::post('admin/posts', 'PostController@store')->middleware('role.admin');
    Route::patch('admin/posts/{post}', 'PostController@update')->middleware('role.admin');
    Route::delete('admin/posts/{post}', 'PostController@destroy')->middleware('role.admin');

    // Category
    Route::get('admin/categories', 'CategoryController@index');
    Route::get('admin/categories/{category}', 'CategoryController@show');
    Route::get('admin/categories/{category}/edit', 'CategoryController@edit');
    Route::patch('admin/categories/{category}', 'CategoryController@update');
    Route::post('admin/categories/', 'CategoryController@store');
    Route::delete('admin/categories/{category}', 'CategoryController@destroy');

    // Tag
    Route::resource('admin/tags', 'TagController')->except(['create']);

    // User
    Route::resource('admin/users', 'UserController');

    //Role
    Route::resource('admin/roles', 'RoleController');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
