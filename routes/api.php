<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Component\ComponentsController;
use App\Http\Controllers\Api\Pages\PagesController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('pages', [PagesController::class, 'store'])->name('createPage');
Route::get('pages', [PagesController::class, 'index'])->name('showAllPages');
Route::get('pages/{page}', [PagesController::class, 'show'])->name('showOnePages');
Route::put('pages/{page}', [PagesController::class, 'update'])->name('updatePage');
Route::delete('pages/{page}', [PagesController::class, 'destroy'])->name('deletePage');




Route::post('components', [ComponentsController::class, 'store'])->name('createComponent');

// Route::get('/user', function (Request $request): mixed {
//     return $request->user();
// })->middleware('auth:api');

// Route::
