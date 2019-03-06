<?php
/**
 * Rutas del admin
 */

Route::namespace('Backend')->prefix('admin')->group(function (){
    Route::resource('users', 'UsersController');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController')->except(['create', 'edit']);

});

Route::get('/user/mis-post/{user}', 'NavigationController@mis_posts')->name('mis.posts');

