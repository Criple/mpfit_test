<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::controller(ProductsController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', 'showCreateForm')->name('createForm');
        Route::post('/', 'store')->name('store');
        Route::get('/{product}', 'show')->name('editForm');
        Route::post('/{product}', 'update')->name('update');
        Route::get('/delete/{id}', 'destroy')->name('destroy');
    });
});

Route::controller(OrdersController::class)->prefix('orders')->name('orders.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'showCreateForm')->name('createForm');
    Route::post('/create', 'store')->name('store');
    Route::get('/{order}', 'show')->name('editForm');
    Route::post('/{order}', 'update')->name('update');
});
