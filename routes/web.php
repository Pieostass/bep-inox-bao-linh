<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

// Catalog & Company Routes
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/san-pham/{slug}', [CatalogController::class, 'show'])->name('catalog.show');
Route::post('/bao-gia', [CatalogController::class, 'quote'])->name('catalog.quote');

// Detailed Information Pages (Giới thiệu, Xưởng sản xuất, Chính sách, Liên hệ, Tin tức)
Route::get('/gioi-thieu', [CatalogController::class, 'about'])->name('catalog.about');
Route::get('/xuong-san-xuat', [CatalogController::class, 'factory'])->name('catalog.factory');
Route::get('/chinh-sach', [CatalogController::class, 'policy'])->name('catalog.policy');
Route::get('/lien-he', [CatalogController::class, 'contact'])->name('catalog.contact');
Route::get('/tin-tuc', [CatalogController::class, 'news'])->name('catalog.news');
Route::get('/tin-tuc/{slug}', [CatalogController::class, 'newsDetail'])->name('catalog.news.detail');
