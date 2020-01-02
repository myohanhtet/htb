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


//Auth::routes();

use App\Imports\DonerImport;
use Maatwebsite\Excel\Facades\Excel;

Route::middleware('auth')->group(function () {

	Route::redirect('/', '/htbs/create');
	Route::resource('htbs', 'HtbController');
	Route::get('print','HtbController@printPdf');
	Route::resource('lucky','LuckyController');
	Route::get('dashboard','DashboardController@index')->name('dashboard.index');
	Route::get('lucky-find','LuckyController@showPrint')->name('lucky.find');
	Route::get('lucky-edit','LuckyController@edit')->name('lucky.edit');
	Route::resource('settings', 'SettingController');
	Route::resource('doners', 'DonerController');
	Route::post('doners/upload','DonerController@upload')->name('doner.upload');
	Route::get('donerlist','DonerController@ajax')->name('doner.ajax');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

<<<<<<< HEAD



=======
Route::get('autocomplete', 'HtbController@autocomplete')->name('autocomplete');
>>>>>>> 638b0819b2e0c9f09be6b8d21c3d0dde71bb9da8
