<?php

// Route::redirect('/', 'admin/htbs/create');
Route::get('/',function(){
	return redirect()->route('dashboard.index');
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});