<?php

namespace Sinevia\Meta;

use Illuminate\Support\ServiceProvider;

class MetaServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            dirname(__DIR__) . '/config/meta.php' => config_path('meta.php'),
            $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
    
    }

}
