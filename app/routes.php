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

App::bind('Svsu\Interfaces\FormRepositoryInterface', 'Svsu\Repositories\DbFormRepository');
App::bind('Svsu\Interfaces\UserRepositoryInterface', 'Svsu\Repositories\DbUserRepository');
App::bind('Svsu\Interfaces\SubmissionRepositoryInterface', 'Svsu\Repositories\DbSubmissionRepository');

Route::get('/', function()
{
	return View::make('index');
});