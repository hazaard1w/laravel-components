<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:52 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

use \Kondratyev\LaravelComponents\Components;

class ComponentCreator {

    /**
     * @var Components\Stub\Facade
     */
    private $_stubComponent;

    /**
     * @var Components\Reflection\Facade
     */
    private $_reflectionComponent;

    /**
     * CreatorService constructor.
     * @param Components\Stub\Facade       $stubComponent
     * @param Components\Reflection\Facade $reflectionComponent
     */
    public function __construct(
        Components\Stub\Facade $stubComponent,
        Components\Reflection\Facade $reflectionComponent
    ) {
        $this->_stubComponent = $stubComponent;
        $this->_reflectionComponent = $reflectionComponent;
    }

    public function createComponent(string $name, string $appPath): void {
        $name = ucwords($name);
        $componentDirectory = $this->_getComponentsDirectory($appPath)."\\{$name}";
        $this->_createComponentDirectory($componentDirectory);
        $this->_createEmptyFacade($componentDirectory, $name);
    }

    private function _getComponentsDirectory(string $appPath): string {
        $componentsDirectory = "{$appPath}\\Components";
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
        $emptyFacadeSource = $this->_getEmptyFacadeSource([
            'DummyComponentName' => $componentName
        ]);

        file_put_contents($facadeFilePath, $emptyFacadeSource->getSource());
    }

    public function _getEmptyFacadeSource(array $variablesData): Components\Reflection\Dto\Source {
        return $this->_stubComponent->getSourceByStubName('empty-facade.php', $variablesData);
    }
}