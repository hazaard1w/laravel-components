<?php
/**
 * Created by WooTeam
 * Date: 5/23/2020 7:29 PM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

use Kondratyev\LaravelComponents\Components;

class EchoTest {

    /**
     * @var Components\Reflection\Facade
     */
    private $_reflectionComponent;

    /**
     * EchoTest constructor.
     * @param Components\Reflection\Facade $reflectionComponent
     */
    public function __construct(Components\Reflection\Facade $reflectionComponent) {
        $this->_reflectionComponent = $reflectionComponent;
    }

    public function addEchoTestToComponent(Components\Reflection\Dto\Source $componentSource): void {

    }
}