<?php

use Botble\Icce\Models\Icce;

if (!defined('ICCE_MODULE_SCREEN_NAME')) {
    define('ICCE_MODULE_SCREEN_NAME', 'icce');
}

if (!function_exists('get_data_icce')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_data_icce()
    {
        return Icce::where('status', 'published')->get();
    }
}