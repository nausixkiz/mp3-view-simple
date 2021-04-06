<?php

use App\Http\Controllers\LanguageController;

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
// Auth::routes();
Auth::routes(['verify' => false]);

Route::group(['middleware' => 'auth'], function() {

    Route::get('/', 'StaterkitController@home');
    Route::get('home', 'StaterkitController@home')->name('home');

    Route::group(['prefix' => 'acp'], function () {
        Route::get('file-manager', 'FileManagerController@index')->name('file-manager');
    });

    // locale Route
    Route::get('lang/{locale}', [LanguageController::class, 'swap']);
});
