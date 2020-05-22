<?php

namespace Kondratyev\LaravelComponents;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider {
    /**
     * Bootstrap services.
     * @return void
     */
    public function boot() {
        $this->commands('pqrs\L5BCrud\Console\Commands\L5BCrud');
        $this->commands('pqrs\L5BCrud\Console\Commands\L5BStub');
        $this->commands('pqrs\L5BCrud\Console\Commands\L5BPage');
    }

    /**
     * Register services.
     * @return void
     */
    public function register() {
        //
    }
}
