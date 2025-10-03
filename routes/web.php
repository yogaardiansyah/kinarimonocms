<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JFestController;

Route::get('/', function () {
    // Ini memberitahu Laravel untuk merender file 'home.blade.php'
    return view('pages.home'); 
});

Route::get('/jadwal-event', JFestController::class);

Route::get('/media-partner', function () {
    // Ini memberitahu Laravel untuk merender file 'home.blade.php'
    return view('pages.media-partner'); 
});

Route::get('/contact', function () {
    // Ini memberitahu Laravel untuk merender file 'home.blade.php'
    return view('pages.contact'); 
});