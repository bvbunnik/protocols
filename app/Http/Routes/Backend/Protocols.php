<?php

Route::resource('protocols', 'ProtocolsController');
Route::post('protocols/preview', 'ProtocolsController@preview')->name('admin.protocols.preview');