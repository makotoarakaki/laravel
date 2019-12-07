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

// Route::resource('posts', 'PostController');
// Route::get('/', 'PostController@index');

// Route::get('hello', 'HelloContoroller@index');

// Route::get('hello/view', 'HelloContoroller@view');

// Route::get('hello/list', 'HelloContoroller@list');

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'GoalController@index');

Route::resource("goals", "GoalController");

Route::resource("goals.todos", "TodoController");

Route::post('/goals/{goal}/todos/{todo}/sort', 'TodoController@sort');

// Route::resource("goals", "GoalController")->middleware('auth');

// Route::resource("goals.todos", "TodoController")->middleware('auth');

// Route::post('/goals/{goal}/todos/{todo}/sort', 'TodoController@sort')->middleware('auth');

Auth::routes();

