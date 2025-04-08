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

Route::middleware(['lang'])->group(function(){
    Route::prefix('sibaf')->group(function() {
        Route::get('/index', 'SIBAFController@index')->name('cefa.sibaf.index');
        Route::get('/admin/welcome', 'SIBAFController@admin')->name('sibaf.admin.welcome');
        
    });
});