<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/jobs', 'JobController');
Route::get('/cat/{category}', 'JobCategoryController@show');
