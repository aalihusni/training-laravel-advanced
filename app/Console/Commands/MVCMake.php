<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MVCMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mvc {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create model, view, controller and migration script';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('make:model', [
            'name' => $this->argument('name'),
            '-m' => true
        ]); // create model and migration script

        $controllerName = $this->argument('name');

        if(strpos($controllerName, 'Controller') === false) {
            $controllerName = $controllerName . 'Controller';
        }

        $this->call('make:controller',[
            'name' => $controllerName,
            '--resource' => true
        ]); // create controller

        // create view
        // generate view
        $viewName = str_slug(str_plural($this->argument('name')));
        $this->files->copyDirectory(__DIR__.'/stubs/view', resource_path('views/'. $viewName));
        $this->info('View generated successfully.');
    }

}
