<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TiketRepositoryInterface;
use App\Repository\TiketRepository;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TiketRepositoryInterface::class, TiketRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
