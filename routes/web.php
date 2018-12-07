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
Auth::routes();

//welcome page
Route::get('/','BlogController@index');

// logout route
Route::get('logout',function(){ \Auth::logout(); return back(); });

// ==== main sections route ====
Route::resource('categories','CategoryController');
Route::resource('users','UserController');
Route::resource('blogs','BlogController');
Route::resource('cmnts','CommentController');

