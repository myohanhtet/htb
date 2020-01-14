<?php

Route::redirect('/', 'admin/htbs/create');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});