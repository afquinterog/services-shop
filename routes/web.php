<?php

use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageCategoriesController;
use App\Http\Controllers\ManageProductsController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\ShopController;
use App\Models\Order;
use App\Notifications\ProductOrderedNotification;
use Illuminate\Support\Facades\Notification;
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

Route::get('/', [ShopController::class, 'index'])
    ->middleware('link.domain.company');

Route::get('/products/{products:slug}', [ShopController::class, 'details'])
    ->middleware('link.domain.company')
    ->name('product.details');

Route::resource('products', ShopController::class)
    ->middleware('link.domain.company');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/configuration', ConfigurationController::class)->name('configuration');
    Route::get('/products', ManageProductsController::class)->name('products');
    Route::get('/categories', ManageCategoriesController::class)->name('categories');
});


Route::get('/email', function () {
    Notification::route('mail', 'rocoutp@gmail.com')
        ->notify(new ProductOrderedNotification(Order::findOrFail(9)));
    return "hi";
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

//Route::get('/manage', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('manage');

require __DIR__.'/auth.php';
