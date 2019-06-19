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


Auth::routes(['verify' => true]);

Route::get('/', 'JobController@index');
Route::get('/home', 'HomeController@index')->name('home');

// jobs routes
Route::get('job/create', 'JobController@create')->name('job.create');
Route::post('job/create', 'JobController@store')->name('job.store');
// {job} is for a slug
Route::get('job/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('job/{id}/edit', 'JobController@update')->name('job.update');
Route::get('job/{id}/{job}', 'JobController@show')->name('job.show');
Route::get('job/my-job', 'JobController@myjob')->name('job.myjob');
Route::get('job/applications', 'JobController@applicant')->name('applicant');
Route::get('job/alljobs', 'JobController@alljobs')->name('alljobs');

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

Route::post('applications/{id}', 'JobController@apply')->name('apply');

// save and unsave jobs
Route::post('save/{id}', 'FavouriteController@save');
Route::post('unsave/{id}', 'FavouriteController@unsave');

// search
Route::get('jobs/search', 'JobController@search');
