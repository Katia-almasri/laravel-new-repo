<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;



/***
 * just for test tailwind css
 */

Route::get('/', function () {
    $route = "whatsapp";
    return view('chat', compact('route'));
})->middleware(['auth', 'verified'])->name('whatsapp');


/**
 * CHAT RESOURCES
 */

Route::resource('chats', ChatController::class)->middleware(['auth', 'verified']);
