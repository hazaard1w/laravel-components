<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 7:57 PM
 */

namespace Kondratyev\LaravelComponents\Components\Boilerplate;

class RepositoryCreator extends BaseCreator {

    public function createRepository(string $modelName, string $appPath): void {
        $repositoriesDirectory = $this->_getRepositoriesDirectory($appPath);
        $variableName = strtolower(snake_case(str_singular($modelName)));
        $repositoryName = ucfirst(camel_case($modelName))."Repository";
        $repositorySource = $this->_stubComponent->getSourceByStubName('repository.php', [
            'name'       => $variableName,
            'namespace'  => '\Repositories',
            'DummyModel'      => ucfirst(camel_case($modelName)),
            'DummyRepository' => $repositoryName,
            '$DummyVariable'   => $modelName,
        ]);
        $repositoryFilePath = $repositoriesDirectory.'/'.$repositoryName.'.php';
        file_put_contents($repositoryFilePath, $repositorySource->getSource());
    }

    private function _getRepositoriesDirectory(string $appPath): string {
        $repositoriesDirectory = "{$appPath}\\Repositories";
        if (file_exists($repositoriesDirectory)) {
            return $repositoriesDirectory;
        }
        mkdir($repositoriesDirectory);
        return $repositoriesDirectory;
    }
}