
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;

// HOMEPAGE
Route::view('/', 'pages.home')->name('home');

// LEARNING CENTER
Route::redirect('/belajar-ccs', '/belajar-ccus', 301);

Route::get('/belajar-ccs/{slug}', fn (string $slug) => redirect()
    ->route('learn.show', $slug, 301))
    ->where('slug', '[a-z0-9-]+');

Route::prefix('belajar-ccus')
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
