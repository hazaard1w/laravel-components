<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:51 PM
 */

namespace Kondratyev\LaravelComponents\Components\Stub;

use Kondratyev\LaravelComponents\Components\Reflection;

class StubFactory {

    public function getEmptyFacadeSource(array $variablesData): Reflection\Dto\Source {
        $stubContent = file_get_contents(__DIR__."/Stubs/empty-facade.php");
        $variables = array_keys($variablesData);
        $variableValues = array_values($variablesData);
        $sourceRaw = str_replace($variables, $variableValues, $stubContent);
        return new Reflection\Dto\Source($sourceRaw);
    }
}