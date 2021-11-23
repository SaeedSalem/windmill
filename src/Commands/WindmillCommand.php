<?php

namespace SaeedSalem\Windmill\Commands;

use Illuminate\Console\Command;
use Saeedsalem\Windmill\Helpers\ConsoleHelper;

class WindmillCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'windmill:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to install windmill dashboard';

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
        $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);
        $this->call('vendor:publish', ['--tag'=>'setting']);
        $this->call('inertia:middleware');
        $this->call('ui:auth');
        $this->call('ui',['type' => 'vue']);
        $this->call('windmill:auth');
        $this->call('vendor:publish', ['--provider' => 'Saeedsalem\Windmill\WindmillServiceProvider']);
    }
}
