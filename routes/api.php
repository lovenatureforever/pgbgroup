<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'apiAuth'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
    Route::get('/users', [UserController::class, 'apiIndex'])->name('api.users.index');
    Route::patch('/users/{id}/active', [UserController::class, 'apiActive'])->name('api.users.active');
    Route::put('/users/{id}/reset-password', [UserController::class, 'apiResetPassword'])->name('api.users.reset');
});
