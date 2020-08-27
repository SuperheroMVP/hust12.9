<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function(Theme $theme)
        {
            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->usePath()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->usePath()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', ['jquery']);

            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', \Auth::user());
            // });


            $theme
                ->asset()
                ->container('footer')
                ->usePath()->add('jquery', 'js/jquery-2.2.4.min.js')
                ->usePath()->add('jquery-plugin-collection', 'js/jquery-plugin-collection.js' )
                ->usePath()->add('custom', 'js/custom.js' )
                ->usePath()->add('revolution.extension.parallax.min', 'js/revolution.extension.parallax.min.js' )
                ->usePath()->add('navigation', 'js/page_navigation.js', ['jquery'])

//                                ->usePath()->add('jquery.themepunch.tools.min', 'js/jquery.themepunch.tools.min.js' )
//                ->usePath()->add('jquery.themepunch.revolution.min', 'js/jquery.themepunch.revolution.min.js' )
//                ->usePath()->add('jquery-ui.min', 'js/jquery-ui.min.js' )
                ->usePath()->add('color-switcher', 'js/color-switcher.js' )
                ->usePath()->add('bootstrap.min', 'js/bootstrap.min.js')
//                ->usePath()->add('revolution.extension.actions.min', 'js/revolution.extension.actions.min.js' )
//                ->usePath()->add('revolution.extension.carousel.min', 'js/revolution.extension.carousel.min.js' )
//                ->usePath()->add('revolution.extension.kenburn.min', 'js/revolution.extension.kenburn.min.js' )
//                ->usePath()->add('revolution.extension.layeranimation.min', 'js/revolution.extension.layeranimation.min.js' )
//                ->usePath()->add('revolution.extension.migration.min', 'js/revolution.extension.migration.min.js' )
//                ->usePath()->add('revolution.extension.navigation.min', 'js/revolution.extension.navigation.min.js' )
//                ->usePath()->add('revolution.extension.slideanims.min', 'js/revolution.extension.slideanims.min.js' )
//                ->usePath()->add('revolution.extension.video.min', 'js/revolution.extension.video.min.js' )
            ;

            $theme
                ->asset()
                ->usePath()->add('bootstrap.min', 'css/bootstrap.min.css')
                ->usePath()->add('font-awesome.min', 'css/font-awesome.min.css')
//                ->usePath()->add('animate', 'css/animate.css')
//                ->usePath()->add('color-switcher', 'css/color-switcher.css')
                ->usePath()->add('font-awesome', 'css/font-awesome.min.css')
                ->usePath()->add('css-plugin-collections', 'css/css-plugin-collections.css')
                ->usePath()->add('custom-bootstrap-margin-padding', 'css/custom-bootstrap-margin-padding.css')
//                ->usePath()->add('jquery-ui', 'css/jquery-ui.min.css')
//                ->usePath()->add('layers', 'css/layers.css')
                ->usePath()->add('menuzord-rounded-boxed', 'css/menuzord-rounded-boxed.css')
                ->usePath()->add('navigation', 'css/navigation.css')
//                ->usePath()->add('preloader', 'css/preloader.css')
//                ->usePath()->add('responsive', 'css/responsive.css')
//                ->usePath()->add('settings', 'css/settings.css')
                ->usePath()->add('style-main', 'css/style-main.css')
//                ->usePath()->add('style-main', 'css/style.css')
                ->usePath()->add('theme-skin-color-set-1', 'css/theme-skin-color-set-1.css')
            ;


            if (function_exists('shortcode')) {
                $theme->composer(['index', 'page', 'post'], function(\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }
        ]
    ]
];
