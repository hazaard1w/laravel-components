<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:51 PM
 */

namespace Kondratyev\LaravelComponents\Components\Stub;

class StubFactory {
    public function getEmptyFacadeSource(): string {
        return file_get_contents(__DIR__."/Stubs/empty-facade.stub");
    }
}