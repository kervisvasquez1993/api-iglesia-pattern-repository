<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Blog\BlogController;
use App\Http\Controllers\Api\CategoryBlog\CategoryBlogController;
use App\Http\Controllers\Api\Component\ComponentsController;
use App\Http\Controllers\Api\ImageBlog\ImageBlogController;
use App\Http\Controllers\Api\Pages\PagesController;
use Illuminate\Support\Facades\Route;


// Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
//     ->middleware(['throttle']);

// Route::middleware(['auth:api'])->group(function () {
//     Route::get('/oauth/clients', [ClientController::class, 'forUser']);
//     Route::post('/oauth/clients', [ClientController::class, 'store']);
//     Route::put('/oauth/clients/{client_id}', [ClientController::class, 'update']);
//     Route::delete('/oauth/clients/{client_id}', [ClientController::class, 'destroy']);

//     Route::get('/oauth/scopes', [ScopeController::class, 'all']);

//     Route::get('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'forUser']);
//     Route::post('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
//     Route::delete('/oauth/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy']);
// });



Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/me', [AuthController::class, 'me'])->name('auth')->middleware('auth:api');
// pages 
Route::post('pages', [PagesController::class, 'store'])->name('createPage')->middleware('auth:api');
Route::get('pages', [PagesController::class, 'index'])->name('showAllPages');
Route::get('pages/{page}', [PagesController::class, 'show'])->name('showOnePages');
Route::put('pages/{page}', [PagesController::class, 'update'])->name('updatePage')->middleware('auth:api');
Route::delete('pages/{page}', [PagesController::class, 'destroy'])->name('deletePage')->middleware('auth:api');
// components
Route::post('components', [ComponentsController::class, 'store'])->name('createComponent')->middleware('auth:api');
// Blogs


// Category Blog

Route::post('category-blog', [CategoryBlogController::class, 'store'])->name('createCategoryBlog')->middleware('auth:api');
Route::get('category-blog', [CategoryBlogController::class, 'index'])->name('showAllCategoryBlog');
Route::get('category-blog/{id}', [CategoryBlogController::class, 'show'])->name('showOneCategoryBlog');
Route::put('category-blog/{id}', [CategoryBlogController::class, 'update'])->name('updateCategoryBlog')->middleware('auth:api');
Route::delete('category-blog/{id}', [CategoryBlogController::class, 'destroy'])->name('deleteCategoryBlog')->middleware('auth:api');


// Blogs
Route::post('blogs', [BlogController::class, 'store'])->name('createBlog')->middleware('auth:api');
Route::get('blogs', [BlogController::class, 'index'])->name('showAllBlogs');
Route::get('blogs/{id}', [BlogController::class, 'show'])->name('showOneBlog');
Route::put('blogs/{id}', [BlogController::class, 'update'])->name('updateBlog')->middleware('auth:api');
Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('deleteBlog')->middleware('auth:api');



// imgBlogs

Route::post('img-blogs', [ImageBlogController::class, 'store'])->name('createImgBlog')->middleware('auth:api');
Route::get('img-blogs', [ImageBlogController::class, 'index'])->name('indexImgBlog');
Route::delete('img-blogs/{id}', [ImageBlogController::class, 'destroy'])->name('deletedImage')->middleware('auth:api');
