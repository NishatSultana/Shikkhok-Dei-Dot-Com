<?php

use Illuminate\Support\Facades\Route;


// Clear Cache, Config, Route, View
Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return "Cache of config, view, route, optimize Cleared!";
});

// Frontend Route
Route::get('/', 'CmsController@index');
Route::get('/about-us', 'CmsController@about_us');
Route::get('/contact-us', 'CmsController@contact');
Route::get('/login', 'CmsController@login')->name('login');
Route::get('/sign-up', 'CmsController@signup');
Route::get('/lost-password', 'CmsController@lost_password');

// Get Teacher Details
Route::get('/teacher/{slug}', 'TeacherController@get_teacher_details');
Route::get('/teachers-list', 'TeacherController@all_teachers');

// Sign-In, Sign-Up, Forget-Password Route
Route::post('/signup', 'SignupController@signup');
Route::get('/account_varification/{token}', 'SignupController@account_verification')->name('verify');
Route::get('/set_password', 'SignupController@set_password')->name('set_password');

Route::post('/forget-password', 'SignupController@forgetpassword');
Route::get('/password-reset-view/{token}', 'SignupController@passwordupdateverify')->name('resetpassword');
Route::post('/passwordupdate', 'SignupController@passwordupdate');
Route::post('/user-login', 'AuthController@authenticate');

Route::middleware(['auth'])->group(function () {

    Route::get('video_chat', 'VideoChatController@index');
    Route::post('auth/video_chat', 'VideoChatController@auth');

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('logout', 'LogoutController@index');

    Route::resource('/permissions', 'PermissionsController')->except(['show']);

    Route::resource('/modules', 'ModulesController')->except(['show']);

    // Group
    Route::get('/groups/{group_id}/permissions', 'GroupsController@showPermissions');
    Route::post('/groups/{group_id}/permissions', 'GroupsController@submitPermissions');
    Route::resource('/groups', 'GroupsController')->except(['show']);

    // Profile
    Route::get('/profile-view', 'ProfileController@profile_index')->name('profile_view');
    Route::get('/change-profile', 'ProfileController@profile_update_view')->name('profile_update');
    Route::post('/update-profile', 'ProfileController@profile_update')->name('update_user_profile');

    //	Password Update
    Route::get('/password-change', 'ProfileController@password_change_index')->name('password_change');
    Route::post('/password-update', 'ProfileController@password_update');

    // Users
    Route::resource('/users', 'UsersController')->except(['show', 'edit', 'update']);
    Route::get('/users/students-guardian', 'UsersController@students_guardians_list');
    Route::get('/users/office', 'UsersController@office_employees_list');

    // Job-Post
    Route::get('/post-job', 'TutorJobController@create');
    Route::post('/job-request', 'TutorJobController@store');
    Route::post('/job-request-update/{id}', 'TutorJobController@update');
    Route::get('/view-jobs', 'TutorJobController@index');
    Route::get('/jobs/{id}/edit', 'TutorJobController@edit');
    Route::get('/jobs/{id}/view', 'TutorJobController@view');
    Route::get('/jobs/{id}', 'TutorJobController@destroy');

    // Job-Board
    Route::get('/job-board', 'JobBoardController@index');
    Route::get('/application-request/{id}', 'ApplicationController@create');
    Route::get('/application-list', 'ApplicationController@index');
    Route::get('/online_application/{id}/view', 'ApplicationController@view');
    Route::delete('/delete_online_application/{id}', 'ApplicationController@destroy');

    // CMS
    Route::resource('/sliders', 'SlidersController')->except(['show']);
    Route::resource('/testimonials', 'TestimonialController')->except(['show']);
    Route::resource('/teachers', 'TeacherController')->except(['show']);


});
