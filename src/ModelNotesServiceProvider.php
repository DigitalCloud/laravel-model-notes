<?php

namespace DigitalCloud\ModelNotes;

use Illuminate\Support\ServiceProvider;

class ModelNotesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/');
        }

        if (! class_exists('CreateNotesTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../database/migrations/create_notes_table.php.stub' => database_path('migrations/'.$timestamp.'_create_notes_table.php'),
            ], 'migrations');
        }

        $this->publishes([
            __DIR__.'/../config/model-notes.php' => config_path('model-notes.php'),
        ], 'config');

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/model-notes.php', 'model-notes');
    }

}
