<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [PageController::class, 'login'])->name('login');
Route::post('login', [PageController::class, 'postLogin'])->name('postLogin');


Route::prefix('admin')->middleware('check.login')->group(function () {
    // Route::resource('category', [CategoryProductController::class]);
    Route::get('logout', [PageController::class, 'logout'])->name('logout');

    Route::prefix('category')->group(function () {
        Route::get('index', [CategoryProductController::class, 'index'])->name('admin.category.index');

        Route::get('add', [CategoryProductController::class, 'create'])->name('admin.category.add');
        Route::post('add', [CategoryProductController::class, 'store'])->name('admin.category.store');

        Route::get('edit', [CategoryProductController::class, 'edit'])->name('admin.category.edit');
    });

    Route::prefix('product')->group(function () {
        Route::get('index', [ProductController::class, 'getIndex'])->name('admin.product.index');
    });
    
});

Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/lsp={slug}&id={id}', [PageController::class, 'getCategory'])->name('page.getCategory');

Route::get('/sp={slug}&id={id}', [PageController::class, 'getProduct'])->name('page.getProduct');

