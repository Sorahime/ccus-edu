
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;

// HOMEPAGE
Route::view('/', 'pages.home')->name('home');

// LEARNING CENTER
Route::prefix('belajar-ccs')
    ->name('learn.')
    ->controller(LearnController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/{slug}', 'show')
            ->where('slug', '[a-z0-9-]+')
            ->name('show');

        Route::post('/{slug}/progress', 'updateProgress')
            ->where('slug', '[a-z0-9-]+')
            ->name('progress');
    });
