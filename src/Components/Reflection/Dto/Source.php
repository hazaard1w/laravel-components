<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 4:25 PM
 */

namespace Kondratyev\LaravelComponents\Components\Reflection\Dto;

class Source {

    /**
     * @var string
     */
    private $_source;

    /**
     * Source constructor.
     * @param string $source
     */
    public function __construct(string $source) {
        $this->_source = $source;
    }

    /**
     * @return string
     */
    public function getSource(): string {
        return $this->_source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void {
        $this->_source = $source;
    }
}