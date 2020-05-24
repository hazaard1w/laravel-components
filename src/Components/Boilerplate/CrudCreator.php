<?php
/**
 * Created by WooTeam
 * Date: 5/23/2020 8:03 PM
 */

namespace Kondratyev\LaravelComponents\Components\Boilerplate;
class CrudCreator extends BaseCreator {

    public function createByModelName(string $modelName, string $appPath): void {
       // $name = strtolower(Helpers\Str::snakeCase(Helpers\Str::strSingular($modelName)));
      //  echo $modelName, $name, ucfirst(Helpers\Str::camelCase($name));
        $this->_createModel($modelName, $appPath);
    }

    private function _createModel(string $modelName, string $appPath): void {
        $modelClassFile = $appPath.'/Models/'.$modelName.'.php';
        if (file_exists($modelClassFile)) {
            return;
        }
        //   $this->model($name, ucfirst(camel_case($name)), 'make-model.stub');
    }

    private function _createAttribute(string $modelName, string $stubName): void {
        // $this->attribute($name, ucfirst(camel_case($name))."Attribute", 'make-attribute.stub');

    }
    private function _createController(string $modelName, string $stubName): void {
        //  $this->controller($name, ucfirst(camel_case($name))."Controller", 'make-controller.stub');
    }
    private function _createRequest(string $modelName, string $stubName): void {
        /**$this->request($name, "Manage".ucfirst(camel_case($name))."Request", 'make-manage-request.stub');
        $this->request($name, "Store".ucfirst(camel_case($name))."Request", 'make-store-request.stub');
        $this->request($name, "Update".ucfirst(camel_case($name))."Request", 'make-update-request.stub');*/
    }
    private function _createEvent(string $modelName, string $stubName): void {
        /**      $this->event($name, ucfirst(camel_case($name))."Created", 'make-event-created.stub');
        $this->event($name, ucfirst(camel_case($name))."Updated", 'make-event-updated.stub');
        $this->event($name, ucfirst(camel_case($name))."Deleted", 'make-event-deleted.stub');*/
    }
    private function _createListener(string $modelName, string $stubName): void {
        //   $this->listener($name, ucfirst(camel_case($name))."EventListener", 'make-listener.stub');
    }
    private function _createRoutes(string $modelName, string $stubName): void {
        // $this->routes($name, str_plural($name), 'make-routes.stub');
    }
    private function _createBreadcrumbs(string $modelName, string $stubName): void {
        //   $this->breadcrumbs($name, $name, 'make-breadcrumbs.stub');
    }
    private function _createView(string $modelName, string $stubName): void {
        /* $this->view($name, 'index', 'make-views-index.stub');
         $this->view($name, 'create', 'make-views-create.stub');
         $this->view($name, 'edit', 'make-views-edit.stub');
         $this->view($name, 'show', 'make-views-show.stub');
         $this->view($name, 'deleted', 'make-views-deleted.stub');
         $this->view($name, '/includes/breadcrumb-links', 'make-views-breadcrumb-links.stub');
         $this->view($name, '/includes/header-buttons', 'make-views-header-buttons.stub');
         $this->view($name, '/includes/sidebar-'.str_plural($name), 'make-views-sidebar.stub');*/
    }
    private function _createLabel(string $modelName, string $stubName): void {
        //  $this->label($name, $name, 'make-backend-labels.stub');
    }
}