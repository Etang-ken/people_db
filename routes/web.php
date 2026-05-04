<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'index'])->name('search.index');
Route::get('/profile/{profile:slug}', [SearchController::class, 'show'])->name('profile.show');
Route::get('/profile/{profile:slug}/pdf', [SearchController::class, 'pdf'])->name('profile.pdf');
Route::get('/profile/{profile:slug}/pdf-raw', [SearchController::class, 'pdfRaw'])->name('profile.pdf.raw');
