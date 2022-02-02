<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/broadcast', function () {
    event(new App\Events\RealTimeMessage("This is a message."));
    dd('broadcasted');
});
