<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('aiAgent');
});


Route::post('/chat', [ChatController::class, 'chat']);


