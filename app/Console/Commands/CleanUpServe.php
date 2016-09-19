<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanUpServe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanupserve {--port=8000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do cache cleanup and serve the application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('cleanup');
        $this->call('serve', [
            '--port' => $this->option('port')
        ]);
    }
}
