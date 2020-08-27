<?php

use Botble\Developmenthistory\Models\Developmenthistory;

if (!defined('DEVELOPMENTHISTORY_MODULE_SCREEN_NAME')) {
    define('DEVELOPMENTHISTORY_MODULE_SCREEN_NAME', 'developmenthistory');
}

if (!function_exists('get_development_histories')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_development_histories()
    {
        return Developmenthistory::where('status', 'published')->orderBy('order', 'asc')->get();
    }
}

