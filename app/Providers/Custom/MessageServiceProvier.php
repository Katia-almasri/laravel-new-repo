<?php

namespace App\Providers\Custom;

use App\Interfaces\BasicRepositoryInterface;
use App\Repositories\MessageRepository;
use App\Services\MessageService;
use Illuminate\Support\ServiceProvider;

class MessageServiceProvier extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // repo -> service
        $this->app->when(concrete: MessageService::class)
            ->needs(MessageRepository::class)
            ->give(MessageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
