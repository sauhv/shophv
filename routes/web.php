<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminModelController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PayMentController;
use App\Http\Controllers\AdminOrdersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminCouponCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductsController::class, 'index']);
Route::get('product/{id}', [ProductsController::class, 'products']);
Route::get('product-series/{id}', [ProductsController::class, 'productsSeries']);
Route::get('detail/{id}', [ProductsController::class, 'detail']);
Route::get('news', [ProductsController::class, 'news']);
Route::get('search', [ProductsController::class, 'getProductSearch']);
Route::get('cart', [CartController::class, 'index']);
Route::post('addToCart', [CartController::class, 'store'])->name('addToCart');
Route::DELETE('removeCart/{id}', [CartController::class, 'destroy'])->name('removecart');
Route::post('checkout', [PayMentController::class, 'checkout'])->middleware('checklogin');
Route::post('checkout/apply_coupon_code', [PayMentController::class, 'apply_coupon_code'])->middleware('checklogin');
Route::get('orders', [OrderController::class, 'index'])->middleware('checklogin');
Route::get('order_items/{id}', [OrderController::class, 'order_items'])->middleware('checklogin');
Route::post('orders', [OrderController::class, 'order_update'])->middleware('checklogin');
// User Auth
Route::get('login', [AuthController::class, 'login_user']);
Route::post('login', [AuthController::class, 'auth_login_user']);
Route::get('logout', [AuthController::class, 'logout_user']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'auth_register']);
Route::get('user/change-password', [AuthController::class, 'change_password'])->name('user.change_password');
Route::post('user/change-password', [AuthController::class, 'update_password'])->name('user.update_password');

// Admin Auth
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AuthController::class, 'login_admin']);
    Route::post('/', [AuthController::class, 'auth_login_admin']);
    Route::get('logout', [AuthController::class, 'logout_admin']);
});

// Route admin
Route::group(['prefix' => 'admin', 'middleware' => 'authadmin'], function () {
    Route::get('dashboard', [AdminController::class, 'index']);
    Route::resource('category', AdminCategoriesController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('model', AdminModelController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('order', AdminOrdersController::class);
    Route::resource('coupon_code', AdminCouponCodeController::class);
    Route::get('order_items/{id}', [AdminOrdersController::class, 'order_items']);
});
