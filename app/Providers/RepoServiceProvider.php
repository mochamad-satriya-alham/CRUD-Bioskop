<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Tiket\TiketRepositoryInterface;
use App\Repository\Tiket\TiketRepository;
use App\Repository\Film\FilmRepositoryInterface;
use App\Repository\Film\FilmRepository;
use App\Services\TicketPriceCalculator;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TiketRepositoryInterface::class, TiketRepository::class);
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(TicketPriceCalculatorInterface::class, TicketPriceCalculator::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
