<?php
/**
 * Created by WooTeam
 * Date: 5/23/2020 7:02 PM
 */

namespace Kondratyev\LaravelComponents\Console\Commands;

use Illuminate\Console\Command;
use Kondratyev\LaravelComponents\Components;

class BoilerplateCrud extends Command {
    protected $signature = 'boilerplate:crud {modelName}';

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
        $this->_boilerplateComponent->createCrudByModelName($modelName, $appPath);
    }
}