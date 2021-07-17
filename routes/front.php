<?php

// Route::redirect('/', 'admin/htbs/create');
Route::get('/','HomeController@index')->name('frontend.home');
Route::get('/donors','HomeController@donor')->name('frontend.donors');
Route::get('donors/search/', 'HomeController@search')->name('frontend.donors.search');


Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
