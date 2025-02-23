<?php

use App\Http\Controllers\Api\Pages\PagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/pages', [PagesController::class, 'store'])->name('createPage');
Route::get('/pages', [PagesController::class, 'index'])->name('showAllPages');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::
