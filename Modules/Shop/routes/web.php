<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\App\Http\Controllers\CartController;
use Modules\Shop\App\Http\Controllers\ProductController;
use Modules\Shop\App\Http\Controllers\ShopController;


Route::get('products', [ProductController::class, 'index'])->name('products.index');

Route::get('/category/{categorySlug}', [ProductController::class, 'category'])->name('products.category');

Route::get('/tag/{tagSlug}', [ProductController::class, 'tag'])->name('products.tag');

Route::get('/{categorySlug}/{productSlug}', [ProductController::class, 'show'])->name('products.show');


Route::middleware(['auth'])->group(function(){
    Route::get('/carts', [CartController::class, 'index'])->name('cart.index');
});

Route::prefix('shop')->group(function() {
    Route::get('/', 'ShopController@index');
});

// Route::group([], function () {
//     Route::resource('shop', ShopController::class)->names('shop');
// });
