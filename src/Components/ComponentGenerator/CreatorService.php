<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:52 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

use Kondratyev\LaravelComponents\Components\ComponentGenerator\Exception\ComponentAlreadyExists;
use Kondratyev\LaravelComponents\Components\ComponentGenerator\Exception\FacadeAlreadyExists;
use \Kondratyev\LaravelComponents\Components;

class CreatorService {

    /**
     * @var Components\Stub\Facade
     */
    private $_stubComponent;

    /**
     * CreatorService constructor.
     * @param Components\Stub\Facade $stubComponent
     */
    public function __construct(Components\Stub\Facade $stubComponent) {
        $this->_stubComponent = $stubComponent;
    }

    public function createComponent(string $name, string $path): void {
        $name = ucwords($name);
        $componentDirectory = "{$path}\\{$name}";

        $this->_createComponentDirectory($componentDirectory);
        $this->_createEmptyFacade($componentDirectory);
    }

    private function _createComponentDirectory(string $componentDirectory): void {
        if (file_exists($componentDirectory)) {
            throw new ComponentAlreadyExists("Component already exists: {$componentDirectory}");
        }
        if (!mkdir($componentDirectory) && !is_dir($componentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $componentDirectory));
        }
    }

    private function _createEmptyFacade(string $componentDirectory): void {
        $facadeFilePath = $componentDirectory.'\\Facade.php';
        if (file_exists($facadeFilePath)) {
            throw new FacadeAlreadyExists("Facade already exists: {$facadeFilePath}");
        }
        $emptyFacadeSource = $this->_stubComponent->getEmptyFacadeSource();
        file_put_contents($facadeFilePath, $emptyFacadeSource);
    }
}