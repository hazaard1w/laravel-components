<?php

namespace Kondratyev\LaravelComponents;

use Illuminate\Support\ServiceProvider;
use Kondratyev\LaravelComponents\Console;

class GeneratorsServiceProvider extends ServiceProvider {
    /**
     * Bootstrap services.
     * @return void
     */
    public function boot() {
        $this->commands(Console\Commands\ComponentGenerate::class);
    }

    /**
     * Register services.
     * @return void
     */
    public function register() {
        //
    }
}
