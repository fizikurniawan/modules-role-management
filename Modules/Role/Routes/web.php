<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('role')->group(function() {
    Route::get('/', 'RoleController@index')->name('role-index');
    Route::get('/create', 'RoleController@create')->name('role-create');
    Route::post('/store', 'RoleController@store')->name('role-store');
});
