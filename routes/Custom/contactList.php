<?php

use App\Http\Controllers\ContactListController;
use Illuminate\Support\Facades\Route;

/**
 * CHAT RESOURCES
 */

Route::resource('contact-list', ContactListController::class)->middleware(['auth']);

Route::get('/get-all-with-accounts', [ContactListController::class, 'getContactListsWithAccounts'])->name('contact-list.index.with-accounts')->middleware(['auth', 'verified']);
