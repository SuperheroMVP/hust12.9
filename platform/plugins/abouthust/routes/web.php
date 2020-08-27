<?php

Route::group(['namespace' => 'Botble\Abouthust\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'abouthusts', 'as' => 'abouthust.'], function () {
            Route::resource('', 'AbouthustController')->parameters(['' => 'abouthust']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'AbouthustController@deletes',
                'permission' => 'abouthust.destroy',
            ]);
        });
    });

});
