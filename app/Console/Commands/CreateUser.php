<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new users fast';

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
        $count = $this->option('count');

        $bar = $this->output->createProgressBar($count);
        
        $bar->start();

        for($i = 1; $i <= $count; $i++) {

            User::create([
                'name' => 'User ' . $i,
                'email' => Str::random(5).'@gmail.com',
                'password' => 'password',
            ]);

            $bar->advance();
        }

        $bar->finish();

        $this->newLine(2);

        $this->info('New Users Successfully Created.');

    }
}
