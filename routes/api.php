<?php

use App\Http\Controllers\Api\Pages\PagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('pages', [PagesController::class, 'store'])->name('createPage');



Route::get('pages', [PagesController::class, 'index'])->name('showAllPages');
Route::get('pages/{page}', [PagesController::class, 'show'])->name('showOnePages');
Route::put('pages/{page}', [PagesController::class, 'update'])->name('updatePage');
Route::delete('pages/{page}', [PagesController::class, 'destroy'])->name('deletePage');
// Route::get('', [PagesController::class,

Route::get('/user', function (Request $request): mixed {
    return $request->user();
})->middleware('auth:api');

// Route::
