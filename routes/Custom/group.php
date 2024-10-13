<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupChatController;
use Illuminate\Support\Facades\Route;

/**
 * CHAT RESOURCES
 */

Route::resource('groups', GroupChatController::class)->middleware(['auth', 'verified']);
