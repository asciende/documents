<?php

use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\DocumentTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;

// Administradores
Route::prefix('v1')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('login', [AuthUserController::class, 'login'])->name('login');
        Route::middleware('auth:sanctum')->group(function () {
            Route::get('profile', [AuthUserController::class, 'profile']);
            Route::post('logout', [AuthUserController::class, 'logout']);
            // esto hay que agregarlo cuando este, ahora no esta disponible
            // Route::apiResource('clients', ClientController::class);
            // Route::apiResource('workflows', WorkflowController::class);
        });
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/documents/upload', [DocumentController::class, 'upload']);    // carga de documentos por parte del administrador
    });
});


// Clientes
Route::prefix('v1')->group(function () {
    Route::prefix('client')->group(function () {
        Route::post('login', [AuthClientController::class, 'login'])->name('client.login');

        Route::middleware(['auth:sanctum', 'ensure.client'])->group(function () {
            Route::get('profile', [AuthClientController::class, 'profile']);
            Route::post('logout', [AuthClientController::class, 'logout']);

            Route::get('/documentTypes', [ClientController::class, 'documentTypes']);   // obtener los tipos de documento del cliente
            Route::get('/documentTypes/filters/{documentType}', [DocumentTypeController::class, 'filters']);   // obtener los filtros segun el tipo de documento
            // este es el anterior
            // Route::get('/documentTypes', [DocumentTypeController::class, 'index']);     // obtener los tipos de documento

            Route::get('/documents/type/{documentType}', [DocumentController::class, 'getByType']); // obtener los documentos segun el tipo
            Route::get('/documents/{document}/data', [DocumentController::class, 'showData']);      // obtener los datos del documento en si

        });
    });
});


