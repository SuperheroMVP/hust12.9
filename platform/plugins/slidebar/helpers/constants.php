<?php

use Botble\Slidebar\Models\Slidebar;

if (!defined('SLIDEBAR_MODULE_SCREEN_NAME')) {
    define('SLIDEBAR_MODULE_SCREEN_NAME', 'slidebar');
}
if (!function_exists('get_slide')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_slide($loai)
    {
       return Slidebar::where('loai', $loai)->where('status' , 'published')->orderBy('sort', 'desc')->get();

    }
}

if (!function_exists('get_img_slidebar')) {
    /**
     * @param bool $convert_to_list
     * @return array
     *
     */
    function get_img_slidebar($loai)
    {
        return Slidebar::where('loai', $loai)->where('status', "published")->get();
    }
}
