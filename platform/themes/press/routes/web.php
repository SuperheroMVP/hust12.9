<?php

Theme::routes();

Route::group(['namespace' => 'Theme\Press\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'PressController@getIndex')->name('public.index');

        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'PressController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'PressController@getView',
        ]);

        Route::get('/profile/all', [
            'uses' => 'PressController@getView',
        ]);

        Route::get('/icce-ieee', [
            'uses' => 'PressController@getView',
        ]);

        Route::get('/tuyensinh/all', [
            'uses' => 'PressController@getView',
        ]);
//        Route::post('feedback', 'PressController@feedback')->name('feedback');
        Route::post('feedback', 'PressController@feedback')->name('feedback');
    });

});
