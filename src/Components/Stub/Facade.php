<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:51 PM
 */

namespace Kondratyev\LaravelComponents\Components\Stub;

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
     * @return string
     */
    public function getEmptyFacadeSource(array $variablesData): string {
        return $this->_stubFactory->getEmptyFacadeSource($variablesData);
    }
}