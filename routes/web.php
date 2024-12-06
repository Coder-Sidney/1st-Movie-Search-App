<?php

use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);
Route::match(['get', 'post'], '/search', [MovieController::class, 'search'])->name('movies.search');

// Route::post('/search', [MovieController::class, 'search'])->name('movies.search');

