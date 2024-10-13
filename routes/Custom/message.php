<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

/**
 * MESSAGE RESOURCES
 */

Route::resource('messages', MessageController::class)->middleware(['auth', 'verified']);

Route::prefix('messages')->group(function () {
    Route::get('/get-all/{chatId}', [MessageController::class, 'getMessagesByChat'])
        ->name('messages.get-all')
        ->middleware(['auth', 'verified']);
});
