<?php

Route::get('protocol-viewer', 'ProtocolsController@index')->name('admin.protocol-viewer');
Route::resource('protocols', 'ProtocolsController');
Route::post('protocols/preview', 'ProtocolsController@preview')->name('admin.protocols.preview');