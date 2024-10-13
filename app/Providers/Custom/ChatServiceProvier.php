<?php

namespace App\Providers\Custom;

use App\Http\Controllers\ChatController;
use App\Interfaces\ChatServiceInterface;
use App\Repositories\ChatRepository;
use App\Services\ChatService;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvier extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // repo -> service
        $this->app->when(ChatService::class)
            ->needs(ChatRepository::class)
            ->give(ChatRepository::class);

        // service -> controller
        $this->app->when(concrete: ChatController::class)
            ->needs(ChatServiceInterface::class)
            ->give(ChatService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
