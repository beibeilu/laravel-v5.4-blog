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

<<<<<<< HEAD
Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');
=======
Route::get('/', function () {
    $tasks = DB::table('tasks')->latest()->get();

    //return $tasks;
    return view('welcome', compact('tasks'));
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->latest()->get();
    //return $tasks;
    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = DB::table('tasks')->find($id);
    //return $tasks;
    return view('tasks.show', compact('task'));
});

Route::get('/about', function () {
    return view('about');
});
>>>>>>> task-using-eloquent
