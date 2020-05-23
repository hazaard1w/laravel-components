<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:49 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

class Facade {

    /**
     * @var ComponentCreator
     */
    private $_componentCreator;

    /**
     * Facade constructor.
     * @param ComponentCreator $componentCreator
     */
    public function __construct(ComponentCreator $componentCreator) {
        $this->_componentCreator = $componentCreator;
    }

    public function createComponent(string $name, string $appPath): void {
        $this->_componentCreator->createComponent($name, $appPath);
    }
}