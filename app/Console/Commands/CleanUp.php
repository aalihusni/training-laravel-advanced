<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do cache cleanup';

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
        $this->call('view:clear');

        $this->call('config:clear');
        $this->call('config:cache');
        
        $this->call('route:clear');
       
        $this->call('optimize');
    }
}
