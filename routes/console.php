<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
});

Artisan::command('test', function(){
	$this->info('test');
})->describe('some test');

Artisan::command('notify', function() {
	$user = \App\User::find(101);

	$user->notify(new \App\Notifications\NotifyNewUser($user));
});

Artisan::command('dispatch {--minute=1}', function(){
	$user = \App\User::find(101);

	// todo: check if user not activate yet the account, send out the dispatch job
	$reminderJob = new \App\Jobs\SendReminderEmail($user);
	$reminderJob->delay(\Carbon\Carbon::now()->addMinutes($this->option('minute')));

	dispatch($reminderJob);
});

// Artisan::command('clean:up', function(){
// 	$this->call('view:clear');

// 	$this->call('config:clear');
//     $this->call('config:cache');
    
//     $this->call('route:clear');
   
//     $this->call('optimize');
// })->describe('Clean up cache files');


// Artisan::command('clean:serve {--port=8000}', function(){
// 	$this->call('clean:up');

//     $this->call('serve',['--port' => $this->option('port')]);
// })->describe('Clean up cache files and serve the application');


Artisan::command('ask',function(){
	$this->ask('ask something');
	$this->secret('ask something secret');
	$this->confirm('ask confirmation');
});

Artisan::command('sendmail', function(){
	
});







