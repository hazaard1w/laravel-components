<?php

namespace Kondratyev\LaravelComponents\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Kondratyev\LaravelComponents\Components;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ComponentGenerate extends Command {

    protected $signature = 'component:generate {name}';

    /**
     * @var Components\ComponentGenerator\Facade
     */
    private $_componentGenerator;

    public function __construct(Components\ComponentGenerator\Facade $componentGenerator) {
        $this->_componentGenerator = $componentGenerator;
        parent::__construct();
    }

    public function handle() {
        $componentName = $this->argument('name');
        $appPath = $this->laravel['path'];
        $this->_componentGenerator->createComponent($componentName, $appPath);
    }

    /**
     * Get the stub file for the generator.
     * @return string
     */
    protected function getStub() {
        return $this->argument('stub');
    }

}