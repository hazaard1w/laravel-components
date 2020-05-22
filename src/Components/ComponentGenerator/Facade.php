<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:49 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

class Facade {

    /**
     * @var CreatorService
     */
    private $_creatorService;

    /**
     * Facade constructor.
     * @param CreatorService $creatorService
     */
    public function __construct(CreatorService $creatorService) {
        $this->_creatorService = $creatorService;
    }

    public function createComponent(string $name, string $path): void {
        $this->_creatorService->createComponent($name, $path);
    }
}