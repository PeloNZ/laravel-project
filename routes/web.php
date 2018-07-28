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

Route::get('/', 'PostController@index')->name('index');

Route::get('/post/{post}', 'PostController@show');

Route::get('/post/{post}/edit', 'PostController@edit')->middleware('auth')->name('editPost');

Route::patch('/post/{post}', 'PostController@update')->middleware('auth')->name('updatePost');

Route::delete('/post/{post}', 'PostController@delete')->middleware('auth')->name('deletePost');

Route::get('/post', 'PostController@create')->name('create')->middleware('auth');

Route::post('/post', 'PostController@store')->middleware('auth');

Route::post('/post/{post}/comment', 'CommentController@store'); 

Route::get('/tasks', 'TaskController@index');

Route::get('/tasks/{task}', 'TaskController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
