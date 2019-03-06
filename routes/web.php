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

Route::get('/', 'NavigationController@index')->name('home');
Route::get('/{slug}', 'NavigationController@post')->name('post');
Route::get('/tags/all', 'NavigationController@tags')->name('tags');
Route::get('/tags/{tag}', 'NavigationController@tag')->name('tag');
Route::get('/authors/{user}', 'NavigationController@post_user')->name('user');
//Route::get('{slug1?}/{slug2?}/{slug3?}/{slug4?}', 'NavigationController@post')->where(['slug1' => '^(?!.?admin).*']);


