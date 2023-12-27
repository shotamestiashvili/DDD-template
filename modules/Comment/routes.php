<?php

use Illuminate\Support\Facades\Route;
use \Comment\Http\Middlewares\CommentMiddleware;
use \Comment\Http\Controllers\CommentController;

Route::middleware(CommentMiddleware::class)
    ->group(function () {
        Route::controller(CommentController::class)
            ->group(function () {
                Route::get('/like', 'like');
                Route::get('/dislike', 'dislike');

                Route::get('/', 'index');
                Route::post('/', 'create');
                Route::put('/', 'update');
                Route::get('/{id}', 'show');
                Route::delete('/{id}', 'delete');

            });
    });
