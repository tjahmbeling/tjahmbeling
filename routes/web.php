<?php

use App\Http\Controllers\CustomController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->controller(CustomController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/articles/{slug}', 'show')->name('articles.show');
    Route::post('/articles/{slug}/rate', 'rate')->name('articles.rate');
    Route::post('/articles/{slug}/comment', 'comment')->name('articles.comment');
    Route::post('/contact', 'contact')->name('contact.submit');
});
