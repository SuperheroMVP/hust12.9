<?php

Route::group(['namespace' => 'Botble\Developmenthistory\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'developmenthistories', 'as' => 'developmenthistory.'], function () {
            Route::resource('', 'DevelopmenthistoryController')->parameters(['' => 'developmenthistory']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'DevelopmenthistoryController@deletes',
                'permission' => 'developmenthistory.destroy',
            ]);
        });
    });

});
