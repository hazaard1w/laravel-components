<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:52 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

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
        $componentDirectory = $this->_getComponentsDirectory($path)."\\{$name}";
        $this->_createComponentDirectory($componentDirectory);
        $this->_createEmptyFacade($componentDirectory, $name);
    }

    private function _getComponentsDirectory(string $path): string {
        $componentsDirectory = "{$path}\\Components";
        if (file_exists($componentsDirectory)) {
            return $componentsDirectory;
        }
        mkdir($componentsDirectory);
        return $componentsDirectory;
    }

    private function _createComponentDirectory(string $componentDirectory): void {
        if (file_exists($componentDirectory)) {
            return;
        }
        if (!mkdir($componentDirectory) && !is_dir($componentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $componentDirectory));
        }
    }

    private function _createEmptyFacade(string $componentDirectory, string $componentName): void {
        $facadeFilePath = $componentDirectory.'\\Facade.php';
        if (file_exists($facadeFilePath)) {
            return;
        }
        $emptyFacadeSource = $this->_stubComponent->getEmptyFacadeSource([
            'DummyComponentName' => $componentName
        ]);
        file_put_contents($facadeFilePath, $emptyFacadeSource);
    }
}