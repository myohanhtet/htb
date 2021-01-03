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
	Route::get('print','HtbController@printPdf');
	Route::get('dashboard','DashboardController@index')->name('dashboard.index');
	Route::get('lucky-find','LuckyController@showPrint')->name('lucky.find');
	Route::get('lucky-edit','LuckyController@edit')->name('lucky-find.edit');
	Route::post('doners/upload','DonerController@upload')->name('doner.upload');
	Route::get('mtlautocomplete', 'HtbController@mtlautocomplete')->name('mtlautocomplete');
	Route::get('donarautocomplete', 'HtbController@donarautocomplete')->name('donarautocomplete');
	Route::get('addressautocomplete', 'HtbController@addressautocomplete')->name('addressautocomplete');
	Route::post('settings/truncate','SettingController@truncate')->name('setting.truncate');
	Route::get('pathan/report', 'PathanController@report')->name('pathan.report');

	Route::resources([
		'htbs' => 'HtbController',
		'lucky' => 'LuckyController',
		'pathans' => 'PathanController',
		'roles' => 'RoleController',
		'permissions' => 'PermissionController',
		'users' => 'UserController',
		'settings' => 'SettingController',
		'doners' => 'DonerController'
	]);