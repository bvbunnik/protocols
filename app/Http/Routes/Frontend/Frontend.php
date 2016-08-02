<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('protocol', 'FrontendController@getData')->name('frontend.protocols.get');
Route::get('/protocols/{protocol}', 'FrontendController@getProtocol')->name('frontend.getprotocol');

Route::get('macros', 'FrontendController@macros')->name('frontend.macros');
Route::get('vectors', 'FrontendController@vectors')->name('frontend.vectors');
Route::get('transport-storage', 'FrontendController@transport')->name('frontend.transport');
Route::get('food', 'FrontendController@food')->name('frontend.food');


/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});