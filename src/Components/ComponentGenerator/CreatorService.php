<?php
/**
 * Created by WooTeam
 * Date: 5/22/2020 11:52 AM
 */

namespace Kondratyev\LaravelComponents\Components\ComponentGenerator;

use PhpParser;
use \Kondratyev\LaravelComponents\Components;

class CreatorService {

    /**
     * @var Components\Stub\Facade
     */
    private $_stubComponent;

    /**
     * @var Components\Reflection\Facade
     */
    private $_reflectionComponent;

    /**
     * CreatorService constructor.
     * @param Components\Stub\Facade       $stubComponent
     * @param Components\Reflection\Facade $reflectionComponent
     */
    public function __construct(Components\Stub\Facade $stubComponent, Components\Reflection\Facade $reflectionComponent) {
        $this->_stubComponent = $stubComponent;
        $this->_reflectionComponent = $reflectionComponent;
    }

    public function createComponent(string $name, string $path): void {
        $name = ucwords($name);
        $componentDirectory = $this->_getComponentsDirectory($path)."\\{$name}";
        $this->_createComponentDirectory($componentDirectory);
        $this->_createEmptyFacade($componentDirectory, $name);
    }

    private function _getComponentsDirectory(string $path): string {
        $componentsDirectory = "{$path}\\Components";
        if (file_exists($componentsDirectory)) {
            return $componentsDirectory;
        }
        mkdir($componentsDirectory);
        return $componentsDirectory;
    }

    private function _createComponentDirectory(string $componentDirectory): void {
        if (file_exists($componentDirectory)) {
            return;
        }
        if (!mkdir($componentDirectory) && !is_dir($componentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $componentDirectory));
        }
    }

    private function _createEmptyFacade(string $componentDirectory, string $componentName): void {
        $facadeFilePath = $componentDirectory.'\\Facade.php';
        if (file_exists($facadeFilePath)) {
            return;
        }
        $emptyFacadeSource = $this->_stubComponent->getEmptyFacadeSource([
            'DummyComponentName' => $componentName
        ]);

        $this->_reflectionComponent->addArgumentToConstructor($emptyFacadeSource, 'string', 'content');

    //    $parser = (new PhpParser\ParserFactory())->create(PhpParser\ParserFactory::PREFER_PHP7);
    //    $builderFactory = new PhpParser\BuilderFactory();
      //  $builderFactory->val()
/*
        try {
            $ast = $parser->parse($emptyFacadeSource);
        } catch (\Throwable $error) {
            echo "Parse error: {$error->getMessage()}\n";
            return;
        }
        $traverser = new PhpParser\NodeTraverser();
        $traverser->addVisitor(new class extends PhpParser\NodeVisitorAbstract {
            public function enterNode(PhpParser\Node $node) {
                if ($node instanceof PhpParser\Node\Stmt\ClassMethod) {
                    var_dump($node->params);
                    $variable = new PhpParser\Node\Expr\Variable("test");
                    $node->params[] = new PhpParser\Node\Param($variable, null, "int");

                    /* foreach($params as $param) {
               // /** @var $param \PhpParser\Node\Param  */
                 /*   $parameter = $method->addParameter($param->name);
                    $parameter->setByReference($param->byRef);
                    $this->setVariableType($parameter, $param->type);
                    $this->setVariableDefaultValue($parameter, $param->default);
                }*/
                  //  $node->stmts = [];
          /*      }
            }
        });*/

      //  $ast = $traverser->traverse($ast);

        //https://stackoverflow.com/questions/38748078/how-to-parse-and-list-all-class-methods-using-nikic-php-parser
       /* foreach ($ast as $node){

           if($node instanceof PhpParser\Node\Stmt\ClassMethod){
               var_dump($node);
           }
           // $node->setAttribute("test", "lalala");
          //  print_r($node->getAttributes());
        }*/

      //  $prettyPrinter = new PhpParser\PrettyPrinter\Standard();
     //   $emptyFacadeSource = $prettyPrinter->prettyPrintFile($ast);
       // $dumper = new PhpParser\NodeDumper;
       // echo $dumper->dump($ast) . "\n";

        file_put_contents($facadeFilePath, $emptyFacadeSource->getSource());
    }
}