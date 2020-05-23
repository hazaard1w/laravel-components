<?php
/**
 * Created by WooTeam
 * Date: 5/23/2020 7:02 PM
 */

namespace Kondratyev\LaravelComponents\Console\Commands;

use Krlove\EloquentModelGenerator;
use Krlove\EloquentModelGenerator\Config;
use Symfony\Component\Console\Input\InputOption;

class BoilerplateModel extends EloquentModelGenerator\Command\GenerateModelCommand {
    protected $name = 'boilerplate:model';

    protected function createConfig() {
        foreach ($this->getArguments() as $argument) {
            $config[$argument[0]] = $this->argument($argument[0]);
        }
        foreach ($this->getOptions() as $option) {
            $value = $this->option($option[0]);
            if ($option[2] == InputOption::VALUE_NONE && $value === false) {
                $value = null;
            }
            $config[$option[0]] = $value;
        }
        $config['output-path'] = "Models";
        $config['namespace'] = "App\Models";
        $config['db_types'] = $this->appConfig->get('eloquent_model_generator.db_types');
        return new Config($config, $this->appConfig->get('eloquent_model_generator.model_defaults'));
    }
}