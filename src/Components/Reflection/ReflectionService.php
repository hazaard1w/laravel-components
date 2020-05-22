<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 4:26 PM
 */

namespace Kondratyev\LaravelComponents\Components\Reflection;

use PhpParser;
use Kondratyev\LaravelComponents\Components;

class ReflectionService {

    /**
     * @var PhpParser\PrettyPrinter\Standard
     */
    private $_prettyPrinter;

    /**
     * @var PhpParser\ParserFactory
     */
    private $_parserFactory;

    /**
     * ReflectionService constructor.
     * @param PhpParser\ParserFactory          $parserFactory
     * @param PhpParser\PrettyPrinter\Standard $prettyPrinter
     */
    public function __construct(PhpParser\ParserFactory $parserFactory, PhpParser\PrettyPrinter\Standard $prettyPrinter) {
        $this->_prettyPrinter = $prettyPrinter;
        $this->_parserFactory = $parserFactory;
    }

    public function addArgumentToConstructor(Components\Reflection\Dto\Source $source, string $argumentType, string $argumentName): void {
        $this->_traverseSource($source, new Components\Reflection\Visitors\AddClassProperty($argumentType, $argumentName));
        $this->_traverseSource($source, new Components\Reflection\Visitors\AddConstructorArgument($argumentType, $argumentName));
    }

    private function _traverseSource(Components\Reflection\Dto\Source $source, PhpParser\NodeVisitorAbstract $nodeVisitorAbstract): void {
        $ast = $this->_getAst($source);
        $traverser = new PhpParser\NodeTraverser();
        $traverser->addVisitor($nodeVisitorAbstract);
        $ast = $traverser->traverse($ast);
        $source->setSource($this->_prettyPrinter->prettyPrintFile($ast));
    }

    /**
     * @param Dto\Source $source
     * @return PhpParser\Node\Stmt[]
     */
    private function _getAst(Components\Reflection\Dto\Source $source): array {
        $parser = $this->_parserFactory->create(PhpParser\ParserFactory::PREFER_PHP7);
        return $parser->parse($source->getSource());
    }
}