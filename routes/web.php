<?php

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/select-register', 'HomeController@register');
Route::get('/employer-register', 'UserRegisterController@EmployerRegister');
Route::get('/job-seeker-register', 'UserRegisterController@JobSeekerRegister');

Route::get('/search', 'HomeController@search');

Route::resource('/jobs', 'JobController');

Route::post('/jobs/{job}/favorite', 'FavoriteController@favorite');
Route::delete('/jobs/{job}/unfavorite', 'FavoriteController@unfavorite');

Route::get('/posted', 'JobController@posted');
Route::get('/jobs/{job}/apply','JobApplyController@show');
Route::post('/jobs/{job}/apply','JobApplyController@apply');

Route::resource('/category', 'CategoryController');
Route::get('/cat/{category}', 'JobCategoryController@show');

Route::get('/{country}/states', 'LocationController@states');

Route::resource('/users', 'UserController');
Route::get('/profile/{user}', 'UserController@profile');
Route::put('/update-profile/{user}', 'UserController@updateProfile');
Route::get('/change-password/{user}', 'ChangePasswordController@changePassword');
Route::post('/change-password/{user}', 'ChangePasswordController@updatePassword');

Route::get('/admin/jobs/pending', 'AdminJobController@Pending');
Route::get('/admin/jobs/approved', 'AdminJobController@Approved');
Route::get('/admin/jobs/blocked', 'AdminJobController@Blocked');
Route::post('/admin/jobs/{job}/approve', 'AdminJobController@Approve');
Route::post('/admin/jobs/{job}/block', 'AdminJobController@Block');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/pages', 'PageController@index');
Route::get('/pages/create','PageController@create');
Route::post('/pages','PageController@store');
Route::get('/pages/{page}/edit','PageController@edit');
Route::patch('/pages/{page}','PageController@update');
Route::delete('/pages/{page}','PageController@destroy');

Route::get('/posts', 'BlogController@index');
Route::get('/posts/create','BlogController@create');
Route::post('/posts','BlogController@store');
Route::get('/posts/{post}/edit','BlogController@edit');
Route::patch('/posts/{post}','BlogController@update');
Route::delete('/posts/{post}','BlogController@destroy');

Route::get('/blog','FrontBlogController@index');
Route::get('/blog/{post}','FrontBlogController@Post');



