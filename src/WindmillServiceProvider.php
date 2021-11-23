<?php

namespace Saeedsalem\Windmill;

use Illuminate\Support\ServiceProvider;
use Saeedsalem\Windmill\Commands\AuthCommand;
use Saeedsalem\Windmill\Commands\WindmillCommand;

class WindmillServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                WindmillCommand::class,
                AuthCommand::class,
            ]);
        }
    }
}
