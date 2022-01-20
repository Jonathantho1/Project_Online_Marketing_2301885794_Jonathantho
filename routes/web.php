<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('checkrole');
Route::get('/admin/home', [HomeController::class, 'admin_home'])->middleware('adminOnly');
Route::get('/products/{id}', [ProductController::class, 'getDetails']);

Route::get('/admin/view-product', [PageController::class, 'adminViewProduct'])->middleware('adminOnly');
Route::get('/admin/insert-product', [ProductController::class, 'getInsertPage'])->middleware('adminOnly');
Route::post('/admin/insert-product', [ProductController::class, 'insertProduct'])->middleware('adminOnly');
Route::get('/admin/update-product/{id}', [ProductController::class, 'getUpdatePage'])->middleware('adminOnly');
Route::post('/admin/update-product/{id}', [ProductController::class, 'updateProduct'])->middleware('adminOnly');
Route::get('/admin/delete-product/{id}', [ProductController::class, 'deleteProduct'])->middleware('adminOnly');

Route::get('/admin/view-category', [PageController::class, 'adminViewCategory'])->middleware('adminOnly');
Route::get('/admin/insert-category', [CategoryController::class, 'getInsertPage'])->middleware('adminOnly');
Route::post('/admin/insert-category', [CategoryController::class, 'insertCategory'])->middleware('adminOnly');
Route::get('/admin/update-category/{id}', [CategoryController::class, 'getUpdatePage'])->middleware('adminOnly');
Route::post('/admin/update-category/{id}', [CategoryController::class, 'updateCategory'])->middleware('adminOnly');
Route::get('/admin/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->middleware('adminOnly');

Route::get('/search', [PageController::class, 'searching']);

Route::get('/cart', [PageController::class, 'getCartView'])->middleware('memberOnly');
Route::post('/insert-cart/{id}', [CartController::class, 'insertCart'])->middleware('memberOnly');
Route::get('/update-cart/{id}', [CartController::class, 'getUpdateCart'])->middleware('memberOnly');
Route::post('/update-cart/{id}', [CartController::class, 'updateCart'])->middleware('memberOnly');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->middleware('memberOnly');

Route::get('/history', [PageController::class, 'viewHistory'])->middleware('memberOnly');
Route::get('/transaction', [CartController::class, 'insertTransaction'])->middleware('memberOnly');