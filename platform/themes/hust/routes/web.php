<?php

Theme::routes();

Route::group(['namespace' => 'Theme\Hust\Http\Controllers', 'middleware' => 'web'], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'HustController@getIndex')->name('public.index');

        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'HustController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'HustController@getView',
        ]);

        Route::get('/profile/all', [
            'uses' => 'HustController@getView',
        ]);

        Route::get('/tuyensinh/all', [
            'uses' => 'HustController@getView',
        ]);
        Route::post('feedback', 'HustController@feedback')->name('feedback');
    });
});




