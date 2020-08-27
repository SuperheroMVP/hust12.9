<?php

use Botble\Tuyensinh\Models\Tuyensinh;

if (!defined('TUYENSINH_MODULE_SCREEN_NAME')) {
    define('TUYENSINH_MODULE_SCREEN_NAME', 'tuyensinh');
}

if (!function_exists('get_data_tuyen_sinh')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_data_tuyen_sinh()
    {
        return Tuyensinh::where('status', 'published')->where('loai', 'tuyensinh')->orderBy('loai', 'desc')->get();
    }
}