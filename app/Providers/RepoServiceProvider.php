<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TiketRepositoryInterface;
use App\Repository\TiketRepository;
use App\Repository\FilmRepositoryInterface;
use App\Repository\FilmRepository;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TiketRepositoryInterface::class, TiketRepository::class);
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
