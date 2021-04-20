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
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/', 'HomeController@index');
    Route::get('download/{id}', 'MusicController@download')->name('download');
    Route::post('rating/{id}', 'MusicController@rating')->name('rating');
    Route::get('init-data', 'InitDataController@index');
    Route::group(['middleware' => 'role:Super Admin'], function() {
        Route::group(['prefix' => 'acp'], function () {
            Route::get('file-manager', 'FileManagerController@index')->name('file-manager');
            Route::get('music/create', 'MusicController@create')->name('music.create');
            Route::post('music', 'MusicController@store')->name('music.store');
            Route::get('rating', 'RatingController@index')->name('rating.index');
        });
        // locale Route
        Route::get('lang/{locale}', [LanguageController::class, 'swap']);
    });
});
