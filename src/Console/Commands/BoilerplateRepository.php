<?php

namespace Kondratyev\LaravelComponents\Console\Commands;

use Illuminate\Console\Command;
use Kondratyev\LaravelComponents\Components;

class BoilerplateRepository extends Command {

    protected $signature = 'boilerplate:repository {modelName}';

    /**
     * @var Components\Boilerplate\Facade
     */
    private $_boilerplateComponent;

    /**
     * BoilerplateRepository constructor.
     * @param Components\Boilerplate\Facade $boilerplateComponent
     */
    public function __construct(Components\Boilerplate\Facade $boilerplateComponent) {
        parent::__construct();
        $this->_boilerplateComponent = $boilerplateComponent;
    }

    public function handle() {
        $modelName = $this->argument('modelName');
        $appPath = $this->laravel['path'];
        $this->_boilerplateComponent->createRepository($modelName, $appPath);
    }
}