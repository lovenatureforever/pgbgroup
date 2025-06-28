<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/corporate-profile', [HomeController::class, 'corporate_profile'])->name('corporate-profile');
Route::get('/leadership-team', [HomeController::class, 'leadership_team'])->name('leadership-team');

Auth::routes();
// auth()->routes();

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix'=> 'admin', 'as'=> 'admin.'], function () {
        Route::post('/upload', [FileController::class, 'apiUploadFile'])->name('upload');
        Route::get('/', [AdminHomeController::class,'index'])->name('dashboard');

        Route::group(['prefix'=> 'users','as'=> 'users.'], function () {
            Route::get('/', [UserController::class,'index'])->name('index');
            Route::get('/new', [UserController::class,'create'])->name('new');
            Route::post('/', [UserController::class,'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class,'edit'])->name('edit');
            Route::put('/{user}', [UserController::class,'update'])->name('update');
            Route::get('/all', [UserController::class,'apiIndex'])->name('api-index');
            Route::delete('/{user}', [UserController::class,'destroy'])->name('delete');
            Route::patch('/{user}/active', [UserController::class,'active'])->name('active');
            Route::put('/{user}/reset-password', [UserController::class,'apiResetPassword'])->name('reset');
        });

        Route::group(['prefix'=> 'blogs','as'=> 'blogs.'], function () {
            Route::get('/', [BlogController::class,'index'])->name('index');
            Route::get('/all', [BlogController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [BlogController::class,'create'])->name('new');
            Route::post('/', [BlogController::class,'store'])->name('store');
            Route::get('/{blog}/edit', [BlogController::class,'edit'])->name('edit');
            Route::put('/{blog}', [BlogController::class,'update'])->name('update');
            Route::delete('/{blog}', [BlogController::class,'destroy'])->name('delete');
            Route::patch('/{blog}/publish', [BlogController::class, 'publish']);
            Route::patch('/{blog}/archive', [BlogController::class, 'archive']);
        });

        Route::group(['prefix'=> 'projects','as'=> 'projects.'], function () {
            Route::get('/', [ProjectController::class,'index'])->name('index');
            Route::get('/all', [ProjectController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [ProjectController::class,'create'])->name('new');
            Route::post('/', [ProjectController::class,'store'])->name('store');
            Route::get('/{project}/edit', [ProjectController::class,'edit'])->name('edit');
            Route::put('/{project}', [ProjectController::class,'update'])->name('update');
            Route::delete('/{project}', [ProjectController::class,'destroy'])->name('delete');
            Route::patch('/{project}/publish', [ProjectController::class, 'publish']);
            Route::patch('/{project}/archive', [ProjectController::class, 'archive']);
        });

        Route::group(['prefix'=> 'slides','as'=> 'slides.'], function () {
            Route::get('/', [SlideController::class,'index'])->name('index');
            Route::get('/all', [SlideController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [SlideController::class,'create'])->name('new');
            Route::post('/', [SlideController::class,'store'])->name('store');
            Route::get('/{slide}/edit', [SlideController::class,'edit'])->name('edit');
            Route::put('/{slide}', [SlideController::class,'update'])->name('update');
            Route::delete('/{slide}', [SlideController::class,'destroy'])->name('delete');
            Route::patch('/{slide}/publish', [SlideController::class, 'publish']);
            Route::patch('/{slide}/archive', [SlideController::class, 'archive']);
        });
    });
});
