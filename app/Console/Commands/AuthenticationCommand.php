<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AuthenticationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:authentication {type="}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create JWT or OAuth Authentication';

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
        $type = strtolower($this->argument('type'));
        if ($type !== 'jwt' || $type !== 'oauth') {
            $this->error('You need to choose a authentication type');
            $type = strtolower($this->choice('Choose your type', ['Booth', 'JWT', 'OAuth']));
        }

        exec('git stash');

        $this->migrate();

        switch (strtolower($type)) {
            case 'jwt':
                $this->installJWT();
                break;
            case 'oauth':
                # code...
                break;
            case 'booth':
                # code...
                break;
            default:
                break;
        }

        exec('git stash apply');
    }

    public function migrate()
    {
        $this->info('Migrating tables');
        exec('git remote add migrations https://github.com/FatoRRR/laravel6-vue-spa.git');
        exec('git remote update');
        exec('git merge --allow-unrelated-histories --no-commit migrations/feature/auth-migrations');
        exec('git remote rm migrations');
    }

    public function installJWT()
    {
    }
}
