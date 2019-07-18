<?php

Auth::routes();

Route::get('/test', function () {
    dd(\App\Country::where('id', 3)->first()->states()->get()->toArray());
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/select-register', 'HomeController@register');
Route::get('/employer-register', 'UserRegisterController@EmployerRegister');
Route::get('/job-seeker-register', 'UserRegisterController@JobSeekerRegister');

Route::get('/search', 'HomeController@search');

Route::resource('/jobs', 'JobController');
Route::get('/posted', 'JobController@posted');

Route::resource('/category', 'CategoryController');
Route::get('/cat/{category}', 'JobCategoryController@show');

Route::get('/{country}/states', 'LocationController@states');

Route::resource('/users', 'UserController');
Route::get('/profile/{user}','UserController@profile');
Route::put('/update-profile/{user}','UserController@updateProfile');

Route::get('/admin/jobs/pending','AdminJobController@Pending');
Route::get('/admin/jobs/approved','AdminJobController@Approved');
Route::get('/admin/jobs/blocked','AdminJobController@Blocked');
