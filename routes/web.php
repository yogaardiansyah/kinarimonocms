<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // Ini memberitahu Laravel untuk merender file 'home.blade.php'
    return view('pages.home'); 
});
