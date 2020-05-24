<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 7:56 PM
 */

namespace Kondratyev\LaravelComponents\Components\Boilerplate;

class Facade {

    /**
     * @var RepositoryCreator
     */
    private $_repositoryCreator;

    /**
     * @var CrudCreator
     */
    private $_crudCreator;

    /**
     * Facade constructor.
     * @param RepositoryCreator $repositoryCreator
     * @param CrudCreator       $crudCreator
     */
    public function __construct(RepositoryCreator $repositoryCreator, CrudCreator $crudCreator) {
        $this->_repositoryCreator = $repositoryCreator;
        $this->_crudCreator = $crudCreator;
    }

    public function createRepository(string $modelName, string $repositoryDirectory): void {
        $this->_repositoryCreator->createRepository($modelName, $repositoryDirectory);
    }

    public function createCrudByModelName(string $modelName, string $appPath): void {
        $this->_crudCreator->createByModelName($modelName, $appPath);
    }
}