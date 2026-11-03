
<?php

use App\Http\Controllers\LearnController;
use Illuminate\Support\Facades\Route;

// HOMEPAGE
Route::view('/', 'pages.home')->name('home');

// ABOUT
Route::view('/tentang-kami', 'pages.about')->name('about');

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
