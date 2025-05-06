<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\AuthorsController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\ContentsController;
use App\Http\Controllers\Web\GenresController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::resource('/contents', ContentsController::class);
    Route::resource('/authors', AuthorsController::class);
    Route::resource('/genres', GenresController::class);
    Route::resource('/categories', CategoriesController::class);
});
