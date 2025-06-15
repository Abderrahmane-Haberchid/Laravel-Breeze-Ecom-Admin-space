<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('products');
    // })->name('products');

    Route::get('/add-product', function () {
        return view('addProduct');
    })->name('addProduct');

    Route::get('/update-product/9', function () {
        return view('updateProduct');
    })->name('updateProduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/add-product', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('products');
    Route::get('/update-product/{id}', [ProductController::class, 'show'])->name('updateProduct');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('editProduct');

});

require __DIR__.'/auth.php';
