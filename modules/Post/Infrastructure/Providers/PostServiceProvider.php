<?php

namespace Post\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Post\Domain\Interfaces\PostRepositoryInterface;
use Post\Infrastructure\Repostiories\PostRepository;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, function ($app) {
            return new PostRepository();
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
