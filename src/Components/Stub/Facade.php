<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:51 PM
 */

namespace Kondratyev\LaravelComponents\Components\Stub;

use Kondratyev\LaravelComponents\Components\Reflection;

class Facade {

    /**
     * @var StubFactory
     */
    private $_stubFactory;

    /**
     * Facade constructor.
     * @param StubFactory $stubFactory
     */
    public function __construct(StubFactory $stubFactory) {
        $this->_stubFactory = $stubFactory;
    }

    /**
     * @param string[] $variablesData
     * @return Reflection\Dto\Source
     */
    public function getEmptyFacadeSource(array $variablesData): Reflection\Dto\Source {
        return $this->_stubFactory->getEmptyFacadeSource($variablesData);
    }
}