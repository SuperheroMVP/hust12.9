<?php

Route::group(['namespace' => 'Botble\Tuyensinh\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'tuyensinhs', 'as' => 'tuyensinh.'], function () {
            Route::resource('', 'TuyensinhController')->parameters(['' => 'tuyensinh']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'TuyensinhController@deletes',
                'permission' => 'tuyensinh.destroy',
            ]);
        });
    });

});
