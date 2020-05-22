<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 6:54 PM
 */

namespace Kondratyev\LaravelComponents\Components\Reflection\Visitors;

use PhpParser;

abstract class NodeVisitor extends PhpParser\NodeVisitorAbstract {
    protected function _builderFactory(): PhpParser\BuilderFactory {
        return new PhpParser\BuilderFactory();
    }
}