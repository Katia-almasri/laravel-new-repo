<?php

namespace App\Providers\Custom;

use App\Http\Controllers\GroupChatController;
use App\Interfaces\ChatServiceInterface;
use App\Services\GroupChatService;
use Illuminate\Support\ServiceProvider;

class ChatGroupServiceProvier extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(concrete: GroupChatController::class)
            ->needs(ChatServiceInterface::class)
            ->give(GroupChatService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
