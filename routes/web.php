<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/{any?}', function () {
    return view('home');
})->where('any', '^(?!api\/)[\/\w\.-]*')->middleware('auth');
