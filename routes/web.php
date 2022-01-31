<?php

use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageCategoriesController;
use App\Http\Controllers\ManageProductsController;
use App\Http\Controllers\MarketPlaceController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('link.domain.company')->group(function () {
    Route::get('/', [ShopController::class, 'index']);
    Route::get('/my-products/{product:slug}', [ShopController::class, 'details'])->name('my-products.details');
});

Route::get('/marketplace', [MarketPlaceController::class, 'index']);
Route::get('/products/{product:slug}', [MarketPlaceController::class, 'details'])->name('products.details');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/configuration', ConfigurationController::class)->name('configuration');
    Route::get('/products', ManageProductsController::class)->name('products');
    Route::get('/categories', ManageCategoriesController::class)->name('categories');
});

require __DIR__.'/auth.php';
