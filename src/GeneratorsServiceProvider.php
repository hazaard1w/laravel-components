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
        $this->commands(Console\Commands\BoilerplateModel::class);
        $this->commands(Console\Commands\BoilerplateRepository::class);
        $this->commands(Console\Commands\BoilerplateCrud::class);
        $this->commands(Console\Commands\BoilerplatePage::class);
    }

    /**
     * Register services.
     * @return void
     */
    public function register() {
        //
    }
}
