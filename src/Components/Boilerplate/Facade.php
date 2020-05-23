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
     * Facade constructor.
     * @param RepositoryCreator $repositoryCreator
     */
    public function __construct(RepositoryCreator $repositoryCreator) {
        $this->_repositoryCreator = $repositoryCreator;
    }

    public function createRepository(string $modelName, string $repositoryDirectory): void {
        $this->_repositoryCreator->createRepository($modelName, $repositoryDirectory);
    }
}