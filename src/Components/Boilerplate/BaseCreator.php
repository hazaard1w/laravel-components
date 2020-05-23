<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 8:08 PM
 */

namespace Kondratyev\LaravelComponents\Components\Boilerplate;

use Kondratyev\LaravelComponents\Components;

abstract class BaseCreator {

    /**
     * @var Components\Stub\Facade
     */
    protected $_stubComponent;

    /**
     * @var Components\Reflection\Facade
     */
    protected $_reflectionComponent;

    /**
     * BaseCreator constructor.
     * @param Components\Stub\Facade       $stubComponent
     * @param Components\Reflection\Facade $reflectionComponent
     */
    public function __construct(Components\Stub\Facade $stubComponent, Components\Reflection\Facade $reflectionComponent) {
        $this->_stubComponent = $stubComponent;
        $this->_reflectionComponent = $reflectionComponent;
    }
}