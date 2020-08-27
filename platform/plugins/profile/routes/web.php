<?php

Route::group(['namespace' => 'Botble\Profile\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'profiles', 'as' => 'profile.'], function () {
            Route::resource('', 'ProfileController')->parameters(['' => 'profile']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ProfileController@deletes',
                'permission' => 'profile.destroy',
            ]);
        });
    });

});
