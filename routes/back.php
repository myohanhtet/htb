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
	Route::resource('htbs', 'HtbController');
	Route::get('print','HtbController@printPdf');
	Route::resource('lucky','LuckyController');
	Route::get('dashboard','DashboardController@index')->name('dashboard.index');
	Route::get('lucky-find','LuckyController@showPrint')->name('lucky.find');
	Route::get('lucky-edit','LuckyController@edit')->name('lucky.edit');
	Route::resource('settings', 'SettingController');
	Route::resource('doners', 'DonerController');
	Route::post('doners/upload','DonerController@upload')->name('doner.upload');
	Route::get('mtlautocomplete', 'HtbController@mtlautocomplete')->name('mtlautocomplete');
	Route::get('donarautocomplete', 'HtbController@donarautocomplete')->name('donarautocomplete');
	Route::get('addressautocomplete', 'HtbController@addressautocomplete')->name('addressautocomplete');
	Route::post('settings/truncate','SettingController@truncate')->name('setting.truncate');
	Route::resource('roles', 'RoleController');
	Route::resource('permissions', 'PermissionController');
	Route::resource('users', 'UserController'); 
	Route::resource('pathans','PathanController');
	Route::get('pathan/report', 'PathanController@report')->name('pathan.report');