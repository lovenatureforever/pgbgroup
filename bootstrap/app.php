<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\Middleware\Authenticate;
// use Illuminate\Auth\AuthenticationException;
// use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth.api' => Authenticate::class,
        ]);
        /* $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('api/*')) {
                // return route('...');
            } else {
                return route('...');
            }
        }); */
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Prevents Redirects to Non-Existent Login Routes
        /* $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Unauthenticated.',
                    'code' => 401
                ], 401);
            }
        }); */

        // forces JSON responses
        // $exceptions->shouldRenderJsonWhen(fn ($request) => $request->is('api/*'));
    })->create();
