<?php

use Botble\Profile\Models\Profile;

if (!defined('PROFILE_MODULE_SCREEN_NAME')) {
    define('PROFILE_MODULE_SCREEN_NAME', 'profile');
}

if (!function_exists('get_all_profile_giang_day')) {
    /**
     * @return array
     *
     */
    function get_all_profile_giang_day()
    {
        return Profile::where('loai', 'giangday')->get();
    }
}

if (!function_exists('get_all_profile_quan_ly')) {
    /**
     * @return array
     *
     */
    function get_all_profile_quan_ly()
    {
        return Profile::where('loai', 'quanly')->get();
    }
}

