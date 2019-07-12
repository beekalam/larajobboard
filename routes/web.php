<?php

Auth::routes();

// $countries = json_decode(file_get_contents(database_path("/seeds/countries.json")));
// foreach($countries as $country){
// dd($country);
// }

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search');
Route::resource('/jobs', 'JobController');
Route::resource('/category','CategoryController');
Route::get('/cat/{category}', 'JobCategoryController@show');

