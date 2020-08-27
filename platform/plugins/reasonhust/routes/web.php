<?php

Route::group(['namespace' => 'Botble\Reasonhust\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'reasonhusts', 'as' => 'reasonhust.'], function () {
            Route::resource('', 'ReasonhustController')->parameters(['' => 'reasonhust']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ReasonhustController@deletes',
                'permission' => 'reasonhust.destroy',
            ]);
        });
    });

});
