<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 7:57 PM
 */

namespace Kondratyev\LaravelComponents\Components\Boilerplate;

use Kondratyev\LaravelComponents\Helpers;

class RepositoryCreator extends BaseCreator {

    public function createRepository(string $modelName, string $appPath): void {
        $repositoriesDirectory = $this->_getRepositoriesDirectory($appPath);
        $variableName = Helpers\Str::camelCase($modelName);
        $repositoryName = ucfirst(Helpers\Str::camelCase($modelName))."Repository";
        $repositorySource = $this->_stubComponent->getSourceByStubName('boilerplate/backend/repository.php', [
            'DummyModel'      => ucfirst(Helpers\Str::camelCase($modelName)),
            'DummyRepository' => $repositoryName,
            '$DummyVariable'   => '$'.$variableName,
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