<?php

Route::group(['middleware' => ['nova'], 'prefix' => '/nova-vendor/ajax-multiselect-nova-field/ajax'], function () {
    Route::get('/', 'Bessamu\AjaxMultiselectNovaField\Http\Controllers\AjaxMultiselectController@getOptionsByQuery');
    Route::get('/options', 'Bessamu\AjaxMultiselectNovaField\Http\Controllers\AjaxMultiselectController@getOptions');
});
