<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 12:51 PM
 */

namespace Kondratyev\LaravelComponents\Components\Stub;

class StubFactory {
    public function getEmptyFacadeSource(array $variablesData): string {
        $stubContent = file_get_contents(__DIR__."/Stubs/empty-facade.php");
        $variables = array_keys($variablesData);
        $variableValues = array_values($variablesData);
        return str_replace($variables, $variableValues, $stubContent);
    }
}