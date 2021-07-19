<?php

namespace Akukoder\FortifySoftUi;

use Akukoder\FortifySoftUi\Commands\FortifySoftUiCommand;
use Illuminate\Support\ServiceProvider;

class FortifySoftUiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
            ], 'fortify-soft-ui-resources');

            // Update public files
            $this->publishes([
                __DIR__ . '/../stubs/public' => base_path('public'),
            ], 'fortify-soft-ui-public');

            $this->commands([
                FortifySoftUiCommand::class,
            ]);
        }
    }
}
