<?php

Route::group(['namespace' => 'Botble\Goalsandprinciples\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'goalsandprinciples', 'as' => 'goalsandprinciples.'], function () {
            Route::resource('', 'GoalsandprinciplesController')->parameters(['' => 'goalsandprinciples']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'GoalsandprinciplesController@deletes',
                'permission' => 'goalsandprinciples.destroy',
            ]);
        });
    });

});
