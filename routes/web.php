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
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'JobController@index');

// jobs routes
Route::get('/job/create', 'JobController@create')->name('job.create');
Route::post('/job/create', 'JobController@store')->name('job.store');
// {job} is for a slug
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('job.show');
Route::get('job/my-job', 'JobController@myjob')->name('job.myjob');

/* Route::get('/company/{id}/{company}', 'CompanyController@show')->name('company.show'); */
// user routes
Route::get('user/profile', 'UserController@index');
Route::post('user/profile/create', 'UserController@store')->name('profile.create');
Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');
Route::post('user/resume', 'UserController@resume')->name('resume');
Route::post('user/avatar', 'UserController@avatar')->name('avatar');
// company routes
Route::get('company/{id}/{company}', 'CompanyController@show')->name('company.show');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/create', 'CompanyController@store')->name('company.store');
Route::post('company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@logo')->name('company.logo');
// employer routes
Route::view('employer/register', 'auth.employer-register');
Route::post('employer/register', 'EmployerController@register')->name('employer.register');
