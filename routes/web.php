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

Route::resource('posts', 'PostController');
//Route::post('laravel/posts/store', 'PostController@store');

//Route::get('laravel', 'PostController@index');
//Route::post('/posts/update/{id}', 'PostController@update');//データ更新
//Route::post('/posts/store', 'HomeController@store');



// Route::get('hello', 'HelloContoroller@index');

// Route::get('hello/view', 'HelloContoroller@view');

// Route::get('hello/list', 'HelloContoroller@list');

Route::get('/', 'HomeController@index');
//Route::get('/laravel', 'GoalController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("laravel/goals", "GoalController")->middleware('auth');

Route::resource("laravel/goals.todos", "TodoController")->middleware('auth');

Route::post('/goals/{goal}/todos/{todo}/sort', 'TodoController@sort')->middleware('auth');

Route::resource("tags", "TagController")->middleware('auth');

Route::post('/goals/{goal}/todos/{todo}/tags/{tag}', 'TodoController@addTag')->middleware('auth');

Route::delete('/goals/{goal}/todos/{todo}/tags/{tag}', 'TodoController@removeTag')->middleware('auth');

Route::post('/upload', 'HomeController@upload');

// 牧田さんアプリーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
//商品詳細ページ
// Route::get('/detail', function () {
//     return view('items/detail');
// });

Route::get('detail/{id}', 'ProductController@show');


//会員ログイン
Route::get('/login', function () {
    return view('entry/login');
});

//会員登録
Route::get('/regist', function () {
    return view('entry/regist');
});


//管理者
Route::resource('admin', 'ProductController');
Route::get('admin/delete/{id}', 'ProductController@destroy');//データ削除


/*
Route::delete('admin/delete/{id}', 'ProductController@destroy');

rute deleteだと以下のエラー
The GET method is not supported for this route. Supported methods: DELETE.
*/

Route::post('admin/update/{id}', 'ProductController@update');//データ更新
// 牧田さんアプリーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

Auth::routes();

