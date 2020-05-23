<?php

namespace App\Components\DummyComponentName;

class EchoTest {
    public function getRandomNumber(): int {
        return rand(0, 100);
    }
}