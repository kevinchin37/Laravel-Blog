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
    Route::get('admin', 'DashboardController@index');
    Route::get('admin/dashboard', 'DashboardController@index');
    Route::get('admin/posts', 'PostController@index');
    Route::get('admin/posts/create', 'PostController@create');
    Route::get('admin/posts/{post}/edit', 'PostController@edit');
    Route::post('admin/posts', 'PostController@store');
    Route::patch('admin/posts/{post}', 'PostController@update');
    Route::delete('admin/posts/{post}', 'PostController@destroy');

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
    Route::resource('admin/users', 'UserController')->middleware('role.admin');

    //Role
    Route::resource('admin/roles', 'RoleController')->middleware('role.admin');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index');
Route::get('/post/{post}', 'PostController@show');

Route::get('/category/{category}', 'CategoryController@show');

Route::get('/tag/{tag}', 'TagController@show');
