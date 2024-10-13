<?php

namespace App\Providers\Custom;

use App\Interfaces\BasicRepositoryInterface;
use App\Repositories\ContactListRepository;
use App\Services\ContactListSerivce;
use Illuminate\Support\ServiceProvider;

class ContactListServiceProvier extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->when(ContactListSerivce::class)
            ->needs(BasicRepositoryInterface::class)
            ->give(ContactListRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
