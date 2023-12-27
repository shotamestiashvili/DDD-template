<?php

namespace Rank\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Rank\Domain\Interfaces\RankRepositoryInterface;
use Rank\Infrastructure\Repositories\RankRepository;


class RankServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RankRepositoryInterface::class, function ($app) {
            return new RankRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
