<?php
/**
 * Created by WooTeam
 * Date: 5/23/2020 7:40 PM
 */

namespace Kondratyev\LaravelComponents\Helpers;

class Str {
    public static function camelCase($value) {
        return \Illuminate\Support\Str::camel($value);
    }

    public static function strSingular($value) {
        return \Illuminate\Support\Str::singular($value);
    }

    public static function snakeCase($value, $delimiter = '_') {
        return \Illuminate\Support\Str::snake($value, $delimiter);
    }
}