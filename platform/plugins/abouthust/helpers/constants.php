<?php

use Botble\Abouthust\Models\Abouthust;

if (!defined('ABOUTHUST_MODULE_SCREEN_NAME')) {
    define('ABOUTHUST_MODULE_SCREEN_NAME', 'abouthust');
}

if (!function_exists('get_about_set')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_about_set($limit)
    {
        return Abouthust::where('status', 'published')->limit($limit)->get();
    }
}