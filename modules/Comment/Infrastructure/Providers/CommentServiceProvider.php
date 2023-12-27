<?php

namespace Comment\Infrastructure\Providers;

use Comment\Domain\Interfaces\CommentRepositoryInterface;
use Comment\Infrastructure\Repostiories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CommentRepositoryInterface::class, function ($app) {
            return new CommentRepository();
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
