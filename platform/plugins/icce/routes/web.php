<?php

Route::group(['namespace' => 'Botble\Icce\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'icces', 'as' => 'icce.'], function () {
            Route::resource('', 'IcceController')->parameters(['' => 'icce']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'IcceController@deletes',
                'permission' => 'icce.destroy',
            ]);
        });
    });

});
