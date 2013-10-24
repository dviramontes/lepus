<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::bind('Lepus\Interfaces\FormRepositoryInterface', 'Lepus\Repositories\DbFormRepository');
App::bind('Lepus\Interfaces\UserRepositoryInterface', 'Lepus\Repositories\DbUserRepository');
App::bind('Lepus\Interfaces\SubmissionRepositoryInterface', 'Lepus\Repositories\DbSubmissionRepository');

Route::get('/', function()
{
	return View::make('index');
});

Route::group(array('prefix' => 'service' ), function(){
    Route::resource('forms', 'FormController');
    Route::resource('submissions', 'SubmissionController');
});