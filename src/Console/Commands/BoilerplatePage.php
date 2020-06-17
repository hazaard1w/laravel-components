<?php

namespace Kondratyev\LaravelComponents\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

/**
 * todo: needs refactoring
 * Class BoilerplatePage
 * @package Kondratyev\LaravelComponents\Console\Commands
 */
class BoilerplatePage extends Command {

    protected $signature = 'boilerplate:page {name}';

    protected $description = 'Create a simple Page structure for Laravel 5 Boilerplate Backend';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle() {
        // Transform l5b:crud command parameter to singular lowercase
        $name = strtolower(snake_case(str_singular($this->argument('name'))));

        // Create Controller "NameController.php"
        $this->controller($name, ucfirst(camel_case($name))."Controller", 'make-page-controller.stub');

        // Create Validation Request "ManageNameRequest.php"
        $this->request($name, "Manage".ucfirst(camel_case($name))."Request", 'make-manage-request.stub');

        // Create Routes "names.php"
        $this->routes($name, str_plural($name), 'make-page-routes.stub');

        // Create Breadcrumbs "names.php"
        $this->breadcrumbs($name, $name, 'make-page-breadcrumbs.stub');

        // Create View "name/index.blade.php"
        // Create View "example/includes/breadcrumb-links.blade.php"
        // Create View "example/includes/sidebar-examples.blade.php"
        $this->view($name, 'index', 'make-page-views-index.stub');
        $this->view($name, '/includes/breadcrumb-links', 'make-page-views-breadcrumb-links.stub');
        $this->view($name, '/includes/sidebar-'.str_plural($name), 'make-views-sidebar.stub');

        $this->label($name, $name, 'make-page-backend-labels.stub');

        return;
    }

    protected function controller($key, $name, $stub) {
        $stubParams = [
            'name'               => $name,
            'stub'               => $this->_getStubDir().$stub,
            'namespace'          => '\Http\Controllers\Backend',
            'array'              => camel_case(str_plural($key)),
            'controller'         => ucfirst(camel_case($key))."Controller",
            'label'              => str_plural($key),
            'model'              => ucfirst(camel_case($key)),
            'repository'         => ucfirst(camel_case($key))."Repository",
            'repositoryVariable' => lcfirst(camel_case($key))."Repository",
            'request'            => ucfirst(camel_case($key))."Request",
            'route'              => str_plural($key),
            'variable'           => camel_case($key),
            'view'               => $key
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Controller '.$stubParams['name'].Artisan::output());
    }

    protected function request($key, $name, $stub) {
        $stubParams = [
            'name'      => $name,
            'stub'      => $this->_getStubDir().$stub,
            'namespace' => '\Http\Requests\Backend\\'.ucfirst(camel_case($key)),
            'model'     => ucfirst(camel_case($key))
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Request '.$stubParams['name'].Artisan::output());
    }

    protected function routes($key, $name, $stub) {
        $stubParams = [
            'name'       => $name,
            'stub'       => $this->_getStubDir().$stub,
            'namespace'  => '\..\routes\backend',
            'controller' => ucfirst(camel_case($key))."Controller",
            'model'      => ucfirst(camel_case($key)),
            'route'      => str_plural($key),
            'variable'   => $key
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Routes '.$stubParams['name'].Artisan::output());
    }

    protected function breadcrumbs($key, $name, $stub) {
        $stubParams = [
            'name'      => $name,
            'stub'      => $this->_getStubDir().$stub,
            'namespace' => '\..\routes\breadcrumbs\backend',
            'route'     => str_plural($key)
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Breadcrumbs '.$stubParams['name'].Artisan::output());

        // Include breadcrumb file in backend.php
        $require_breadcrumb = "require __DIR__.'/$name.php';";

        $backend_path = base_path("routes/breadcrumbs/backend/backend.php");

        $breadcrumbs = explode("\n", file_get_contents($backend_path));

        if (!in_array($require_breadcrumb, $breadcrumbs)) {
            $myfile = file_put_contents($backend_path, PHP_EOL.$require_breadcrumb, FILE_APPEND | LOCK_EX);
        }
    }

    protected function view($key, $name, $stub) {
        $stubParams = [
            'name'      => $name.".blade",
            'stub'      => $this->_getStubDir().$stub,
            'namespace' => '\..\resources\views\backend'.'\\'.$key,
            'label'     => str_plural($key),
            'array'     => camel_case(str_plural($key)),
            'route'     => str_plural($key),
            'variable'  => camel_case($key),
            'view'      => $key,
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('View '.$stubParams['name'].Artisan::output());
    }

    protected function label($key, $name, $stub) {
        $stubParams = [
            'name'      => 'backend_'.str_plural($name),
            'stub'      => $this->_getStubDir().$stub,
            'namespace' => '\..\resources\lang\en\\',
            'label'     => str_plural($key),
            'array'     => camel_case(str_plural($key)),
            'route'     => str_plural($key),
            'variable'  => camel_case($key),
            'view'      => $key,
            'model'     => ucfirst(camel_case($key)),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Label '.$stubParams['name'].Artisan::output());
    }

    private function _getStubDir(): string {
        return __DIR__.'/../../Components/Stub/Stubs/boilerplate/old/';
    }
}
