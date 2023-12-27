<?php

namespace Post\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
