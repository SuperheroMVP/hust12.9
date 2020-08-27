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
//                ->usePath()->add('jquery', 'plugins/jquery/jquery.min.js')
                ->usePath()->add('jquery', 'js/jquery.min.js')
                ->usePath()->add('popper', 'js/popper.min.js', ['jquery'])
                ->usePath()->add('bootstrap', 'js/bootstrap.min.js', ['jquery'])
//                ->usePath()->add('bootstrap', 'js/bootstrap.min.js', ['jquery'])
//                ->usePath()->add('overflow-text', 'plugins/overflow-text.js', ['jquery'])
//                ->usePath()->add('jquery.parallax', 'plugins/jquery.parallax-1.1.3.js', ['jquery'])
//                ->usePath()->add('custom', 'js/custom.min.js', ['jquery'])
//                ->usePath()->add('ripple.js', 'js/ripple.js', ['jquery'])
//                ->usePath()->add('sweet-alert-js', 'js/sweetalert.min.js', ['jquery'])
                ->usePath()->add('jquery-migrate', 'js/jquery-migrate.min.js', ['jquery'])
                ->usePath()->add('colors', 'js/colors.js', ['jquery'])
                ->usePath()->add('jquery-stellar-min', 'js/jquery.stellar.min.js', ['jquery'])
                ->usePath()->add('particles', 'js/particles.min.js', ['jquery'])
                ->usePath()->add('facnybox', 'js/facnybox.min.js', ['jquery'])
                ->usePath()->add('jquery-magnific-popup', 'js/jquery.magnific-popup.min.js', ['jquery'])
                ->usePath()->add('masonry-pkgd', 'js/masonry.pkgd.min.js', ['jquery'])
                ->usePath()->add('circle-progress', 'js/circle-progress.min.js', ['jquery'])
                ->usePath()->add('owl-carousel', 'js/owl.carousel.min.js', ['jquery'])
                ->usePath()->add('waypoints', 'js/waypoints.min.js', ['jquery'])
                ->usePath()->add('slicknav', 'js/slicknav.min.js', ['jquery'])
                ->usePath()->add('jquery-counterup', 'js/jquery.counterup.min.js', ['jquery'])
                ->usePath()->add('easing', 'js/easing.min.js', ['jquery'])
                ->usePath()->add('wow', 'js/wow.min.js', ['jquery'])
                ->usePath()->add('jquery-scrollUp', 'js/jquery.scrollUp.min.js', ['jquery'])
                ->usePath()->add('gmaps', 'js/gmaps.min.js', ['jquery'])
                ->usePath()->add('main', 'js/main.js', ['jquery'])
                ->usePath()->add('navigation', 'js/page_navigation.js', ['jquery'])
            ;

            $theme
                ->asset()
                ->usePath()->add('bootstrap-css', 'css/bootstrap.min.css')
                ->usePath()->add('font-awesome', 'css/font-awesome.min.css')
//                ->usePath()->add('ionicons', 'css/ionicons.min.css')
//                ->usePath()->add('bootstrap', 'css/bootstrap.min.css')
//                ->usePath()->add('font-awesome', 'css/font-awesome.min.css')
                ->usePath()->add('jquery.fancybox', 'css/jquery.fancybox.min.css')
                ->usePath()->add('owl-carousel', 'css/owl.carousel.min.css')
                ->usePath()->add('owl-theme-default', 'css/owl.theme.default.min.css')
                ->usePath()->add('animate', 'css/animate.min.css')
                ->usePath()->add('slicknav', 'css/slicknav.min.css')
                ->usePath()->add('magnific-popup', 'css/magnific-popup.css')
                ->usePath()->add('normalize', 'css/normalize.css')
                ->usePath()->add('style', 'css/style.css')
                ->usePath()->add('responsive', 'css/responsive.css')
                ->usePath()->add('color1', 'css/color1.css')

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
