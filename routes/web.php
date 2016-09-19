<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

//Route::get('/users', 'UsersController@index')->middleware('json');

Route::get('/users', 'UsersController@index');//->middleware('viewTojson');


Route::get('/notify', function(){
	$user = \App\User::find(101);

	$user->notify(new \App\Notifications\NewUserRegistered($user));
});

Route::get('dispatch', function(){
	$user = \App\User::find(101);

	// todo: check if user not activate yet the account, send out the dispatch job
	$reminderJob = new \App\Jobs\SendReminderEmail($user);
	$reminderJob->delay(\Carbon\Carbon::now()->addMinutes(1));

	dispatch($reminderJob);
});



