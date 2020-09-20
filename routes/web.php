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

    // Role
    Route::resource('admin/roles', 'RoleController')->middleware('role.admin');

    // Search
    Route::get('admin/search', 'SearchController@index');
    Route::post('admin/search', 'SearchController@index');

    // Invitation
    Route::get('admin/invitations', 'InvitationController@index')->middleware('role.admin');
    Route::get('admin/invitations/create', 'InvitationController@create');
    Route::post('admin/invitations', 'InvitationController@store');
    Route::delete('admin/invitations/{invitation}', 'InvitationController@destroy');

    // Profile
    Route::get('admin/user/{user}/profile/edit', 'ProfileController@edit');
    Route::patch('admin/user/{user}/profile', 'ProfileController@update');
});

// Post
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index');
Route::get('/post/{post}', 'PostController@show');

//Comment
Route::post('/post/comment', 'CommentController@store');
Route::post('/post/comment/reply','ReplyController@store');
Route::get('/comments', 'CommentController@index');
Route::get('/comments/{post_id}', 'CommentController@index');
Route::get('/comments/reply/thread', 'ReplyController@index');
Route::get('/comments/reply/thread/{parent_id}', 'ReplyController@index');

// Category
Route::get('/category/{category}', 'CategoryController@show');

// Tag
Route::get('/tag/{tag}', 'TagController@show');

// Invitation
Route::get('/invitation/{invitation}', 'Admin\InvitationController@show')->middleware('invitation.token');

// Login / Registration
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::post('/invitation', 'auth\Invitation\RegisterController@register');
