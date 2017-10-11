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

Route::get('/about', function () {

    $tasks = DB::table('tasks')->get();
    $name = 'bob';


    return view('about', [
        'tasks' => $tasks,
        'name' => $name
    ]);
});

Route::get('/tasks', function () {

    $tasks = DB::table('tasks')->latest()->get();

    return view('tasks.index', [
        'tasks' => $tasks
    ]);
});

Route::get('/tasks/{id}', function ($id) {

    $task = DB::table('tasks')->find($id);

    return view('tasks.show', [
        'task' => $task
    ]);
});
