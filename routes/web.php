<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// auth()->routes();

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix'=> 'admin', 'as'=> 'admin.'], function () {
        Route::get('/', [AdminHomeController::class,'index'])->name('dashboard');

        Route::group(['prefix'=> 'users','as'=> 'users.'], function () {
            Route::get('/', [UserController::class,'index'])->name('index');
            Route::get('/new', [UserController::class,'create'])->name('new');
            Route::post('/', [UserController::class,'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class,'edit'])->name('edit');
            Route::put('/{user}', [UserController::class,'update'])->name('update');
            Route::get('/all', [UserController::class,'apiIndex'])->name('api-index');
            Route::delete('/{id}', [UserController::class,'destroy'])->name('delete');
            Route::patch('/{id}/active', [UserController::class,'active'])->name('active');
            Route::put('/{id}/reset-password', [UserController::class,'apiResetPassword'])->name('reset');
        });
    });
});
