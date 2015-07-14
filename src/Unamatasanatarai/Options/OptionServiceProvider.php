<?php namespace Unamatasanatarai\Options;

use Illuminate\Support\ServiceProvider;

class OptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // remember to run `php artisan vendor:publish`
        $this->publishes([
            realpath(__DIR__ . '/migrations') => $this->app->databasePath() . '/migrations',
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
