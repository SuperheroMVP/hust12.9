<?php

use Botble\Goalsandprinciples\Models\Goalsandprinciples;

if (!defined('GOALSANDPRINCIPLES_MODULE_SCREEN_NAME')) {
    define('GOALSANDPRINCIPLES_MODULE_SCREEN_NAME', 'goalsandprinciples');
}

if (!function_exists('get_goals_and_principles')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_goals_and_principles($limit)
    {
        return Goalsandprinciples::where('status', 'published')->orderBy('sub', 'asc')->limit($limit)->get();
    }
}
