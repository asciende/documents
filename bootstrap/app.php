<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

 

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'ensure.user' => \App\Http\Middleware\EnsureUserIsBackend::class,
            'ensure.client' => \App\Http\Middleware\EnsureUserIsClient::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            return response()->json([
                'message' => "Usuario no autenticado",
                //'message' => $e->getMessage(),
            ], 401);
        });
        // este es el mismo mensaje que esta arriba pero mas pulido
        // $exceptions->render(function (AuthenticationException $e, Request $request) {
        //     if ($request->is('api/*')) {
        //         return response()->json(['message' => "Usuario no autenticado",
        //             //'message' => $e->getMessage(),
        //         ], 401);
        //     }
        // });


        $exceptions->render(function (Exception $e, Request $request) {
            return response()->json(['message' => $e->getMessage(),], 401);
        });


        // if ($exception instanceof AuthenticationException) {
        //     if ($request->expectsJson() || $request->is('api/*')) { // Check if it's an API request
        //         return response()->json(['message' => 'Unauthenticated.'], 401);
        //     }
        // }

        // return parent::render($request, $exception);



        // $exceptions->respond(function (Response $response) {
        //     return response()->json(['message' => 'Ocurrió un error al ejecutar la peticion.'], 401);
        // });
        //dd($exceptions);
        // $exceptions->render(function (AuthenticationException $e, Request $request) {
        //     return response()->json(['message' => 'No autenticadoX.',], Response::HTTP_UNAUTHORIZED);
        //     if ($request->expectsJson()) {
        //         return response()->json(['message' => 'No autenticadoX.',], Response::HTTP_UNAUTHORIZED);
        //     }
        // });
        // $exceptions->respond(function (Response $response) {
        //     return response()->json(['message' => 'No autenticado.'], 401);
        //     //dd($response->getStatusCode());
        //     // if ($response->getStatusCode() === 419) {
        //     //     return back()->with([
        //     //         'message' => 'The page expired, please try again.',
        //     //     ]);
        //     // }
        //     // return $response;

        // });
        
    })->create();
