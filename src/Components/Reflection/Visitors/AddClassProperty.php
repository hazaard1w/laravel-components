<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 4:45 PM
 */

namespace Kondratyev\LaravelComponents\Components\Reflection\Visitors;

use PhpParser;

class AddClassProperty extends NodeVisitor {

    /**
     * @var string
     */
    private $_name;

    /**
     * @var string
     */
    private $_type;

    public function __construct(string $type, string $name) {
        $this->_name = $name;
        $this->_type = $type;
    }

    public function enterNode(PhpParser\Node $node) {
        if ($node instanceof PhpParser\Node\Stmt\Class_) {
            $property = $this->_builderFactory()->property('_'.$this->_name);
            $property->makePrivate();
            $property->setDocComment("/**\n* @var {$this->_type}\n*/\n");
            array_unshift( $node->stmts, $property->getNode());
        }
    }
}