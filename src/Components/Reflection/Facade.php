<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:50 PM
 */

namespace Kondratyev\LaravelComponents\Components\Reflection;

use Kondratyev\LaravelComponents\Components;

class Facade {

    /**
     * @var ReflectionService
     */
    private $_reflectionService;

    /**
     * Facade constructor.
     * @param ReflectionService $reflectionService
     */
    public function __construct(ReflectionService $reflectionService) {
        $this->_reflectionService = $reflectionService;
    }

    public function addArgumentToConstructor(Components\Reflection\Dto\Source $source, string $argumentType, string $argumentName): void {
        $this->_reflectionService->addArgumentToConstructor($source, $argumentType, $argumentName);
    }
}