<?php

use Botble\Page\Repositories\Interfaces\PageInterface;
use Botble\Page\Supports\Template;

if (!function_exists('get_featured_pages')) {
    /**
     * @param $limit
     * @return mixed
     *
     */
    function get_featured_pages($limit)
    {
        return app(PageInterface::class)->getFeaturedPages($limit);
    }
}

if (!function_exists('get_page_by_slug')) {
    /**
     * @param $slug
     * @return mixed
     *
     */
    function get_page_by_slug($slug) {
        return app(PageInterface::class)->getBySlug($slug, true);
    }
}

if (!function_exists('get_all_pages')) {
    /**
     * @param boolean $active
     * @return mixed
     *
     */
    function get_all_pages($active = true)
    {
        return app(PageInterface::class)->getAllPages($active);
    }
}

if (!function_exists('register_page_template')) {
    /**
     * @param array $templates
     * @return void
     *
     */
    function register_page_template(array $templates)
    {
        Template::registerPageTemplate($templates);
    }
}

if (!function_exists('get_page_templates')) {
    /**
     * @return array
     *
     */
    function get_page_templates()
    {
        return Template::getPageTemplates();
    }
}

if (!function_exists('get_page_for_template')) {
    /**
     * @return array
     *
     */
    function get_page_for_template($name, $limmit)
    {
        return \Botble\Page\Models\Page::where('temp_view', $name)->limit($limmit)->get();
    }
}

if (!function_exists('get_page_nghien_cuu')) {
    /**
     * @return array
     *
     */
    function get_page_nghien_cuu($name)
    {
        return \Botble\Page\Models\Page::where('temp_view', $name)->get();
    }
}

if (!function_exists('get_page_con_nguoi')) {
    /**
     * @return array
     *
     */
    function get_page_con_nguoi($name)
    {
        return \Botble\Page\Models\Page::where('temp_view', $name)->get();
    }
}

