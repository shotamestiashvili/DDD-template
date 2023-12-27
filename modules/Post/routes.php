<?php

use Illuminate\Support\Facades\Route;
use \Post\Http\Controllers\PostController;
use \Post\Http\Middlewares\PostMiddleware;

Route::middleware(PostMiddleware::class)
    ->group(function () {
        Route::controller(PostController::class)
            ->group(function () {
                Route::get('/rank', 'rank');
                Route::get('/like', 'like');
                Route::get('/dislike', 'dislike');

                Route::get('/', 'index');
                Route::post('/', 'create');
                Route::put('/', 'update');
                Route::get('/{id}', 'show');
                Route::delete('/{id}', 'delete');
            });
    });
