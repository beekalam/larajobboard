<?php

Auth::routes();

Route::get('/test', function () {
    dd(\App\Country::where('id', 3)->first()->states()->get()->toArray());
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/select-register','HomeController@register');
Route::get('/search', 'HomeController@search');

Route::resource('/jobs', 'JobController');
Route::get('/posted', 'JobController@posted');

Route::resource('/category', 'CategoryController');
Route::get('/cat/{category}', 'JobCategoryController@show');

Route::get('/{country}/states', 'LocationController@states');

Route::resource('/users','UserController');
