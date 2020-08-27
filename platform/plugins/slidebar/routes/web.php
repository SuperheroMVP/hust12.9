<?php

Route::group(['namespace' => 'Botble\Slidebar\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'slidebars', 'as' => 'slidebar.'], function () {
            Route::resource('', 'SlidebarController')->parameters(['' => 'slidebar']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'SlidebarController@deletes',
                'permission' => 'slidebar.destroy',
            ]);
        });
    });

});
