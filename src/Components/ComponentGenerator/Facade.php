<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:49 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

use Kondratyev\LaravelComponents\Components;

class Facade {

    /**
     * @var ComponentCreator
     */
    private $_componentCreator;

    /**
     * @var EchoTest
     */
    private $_echoTest;

    /**
     * Facade constructor.
     * @param ComponentCreator $componentCreator
     * @param EchoTest         $echoTest
     */
    public function __construct(ComponentCreator $componentCreator, EchoTest $echoTest) {
        $this->_componentCreator = $componentCreator;
        $this->_echoTest = $echoTest;
    }

    public function createComponent(string $name, string $appPath): void {
        $this->_componentCreator->createComponent($name, $appPath);
    }

    public function addEchoTestToComponent(Components\Reflection\Dto\Source $componentSource): void {
        $this->_echoTest->addEchoTestToComponent($componentSource);
    }
}