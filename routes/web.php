<?php

Auth::routes();

Route::get('/test', function () {
    error_log('in test');
    // error_log($_SERVER['REMOTE_ADDR']);
    // error_log(print_r($_SERVER,true));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        error_log("id: " . $id);
    }
    return date('Y-m-d H:i:s', time());
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/select-register', 'HomeController@register');
Route::get('/employer-register', 'UserRegisterController@EmployerRegister');
Route::get('/job-seeker-register', 'UserRegisterController@JobSeekerRegister');

Route::get('/search', 'HomeController@search');

Route::resource('/jobs', 'JobController');
Route::post('/jobs/{job}/favorite', 'FavoriteController@favorite');
Route::delete('/jobs/{job}/unfavorite', 'FavoriteController@unfavorite');
Route::get('/posted', 'JobController@posted');

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
Route::delete('/pages/{page}','PageController@destroy');
Route::get('/posts', 'BlogController@index');
