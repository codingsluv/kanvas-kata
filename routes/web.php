<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProfileController;
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


    // *** Routes BlogPost ***
    Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/{id}', [BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.destroy');

    // *** Routes Blog AI ***
    Route::post('blog/create', [BlogPostController::class, 'ai'])->name('blog.ai');
});

require __DIR__.'/auth.php';
