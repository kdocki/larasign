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

Route::get('/', function()
{
	$user = new UserPresenter(new User);

	$user->favoriteColor = rand(0, 1) ? 'blue' : null;

	return View::make('hello', compact('user'));
});