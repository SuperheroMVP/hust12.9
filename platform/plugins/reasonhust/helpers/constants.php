<?php

use Botble\Reasonhust\Models\Reasonhust;

if (!defined('REASONHUST_MODULE_SCREEN_NAME')) {
    define('REASONHUST_MODULE_SCREEN_NAME', 'reasonhust');
}

if (!function_exists('get_reason_set')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_reason_set($limit)
    {
        return Reasonhust::where('status', 'published')->limit($limit)->get();
    }
}