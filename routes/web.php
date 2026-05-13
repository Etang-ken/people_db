<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'index'])->name('search.index');
Route::get('/profile/{profile:slug}', [SearchController::class, 'show'])->name('profile.show');
Route::get('/profile/{profile:slug}/pdf', [SearchController::class, 'pdf'])->name('profile.pdf');
Route::get('/profile/{profile:slug}/pdf-raw', [SearchController::class, 'pdfRaw'])->name('profile.pdf.raw');

// Data Deletion Request Routes
Route::get('/profile/{profile:slug}/clear-information', [SearchController::class, 'clearInfoForm'])->name('profile.clear-info.form');
Route::post('/profile/{profile:slug}/clear-information/documents', [SearchController::class, 'storeDocuments'])->name('profile.clear-info.documents');
Route::get('/profile/{profile:slug}/clear-information/confirm/{requestId}', [SearchController::class, 'confirmEmailForm'])->name('profile.clear-info.confirm.form');
Route::post('/profile/{profile:slug}/clear-information/confirm/{requestId}', [SearchController::class, 'submitConfirmation'])->name('profile.clear-info.confirm.submit');
Route::get('/profile/{profile:slug}/clear-information/success', [SearchController::class, 'success'])->name('profile.clear-info.success');
