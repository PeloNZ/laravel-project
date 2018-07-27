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

Route::get('/', 'PostController@index'); 

Route::get('/post/{post}', 'PostController@show'); 

Route::get('/post', 'PostController@create')->name('create');

Route::post('/post', 'PostController@store'); 

Route::post('/post/{post}/comment', 'CommentController@store'); 

Route::get('/tasks', 'TaskController@index');

Route::get('/tasks/{task}', 'TaskController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
