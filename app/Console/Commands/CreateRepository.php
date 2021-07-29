<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repository {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new repository folder';

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
     * @return int
     */
    public function handle()
    {
        return app_path()."/Repositories".'/'. $this->option('name') .'php';
        $this->info('New Repository Successfully Created.');
    }
}
