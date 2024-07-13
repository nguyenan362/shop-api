<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\tbl_productController;
use App\Http\Controllers\tbl_brandController;
use App\Http\Controllers\tbl_categoryProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth.token')->get('/me', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function ($router) {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout')->middleware('auth.token');
    Route::post('refresh', 'refresh')->name('refresh');
});

Route::apiResource('products', tbl_productController::class);
Route::apiResource('brands', tbl_brandController::class);
Route::apiResource('category-products', tbl_categoryProductController::class);
Route::apiResource('checkouts', CheckoutController::class);

// Route để lấy giỏ hàng theo user_id
Route::get('carts/user/{user_id}', [CartController::class, 'getCartByUserId']);

//// Route để thêm sản phẩm vào giỏ hàng
Route::post('carts/add', [CartController::class, 'addToCart']);

// Route để get sản phẩm mới nhất
Route::get('new-products', [tbl_ProductController::class, 'getNewProducts']);

// Route để get sản phẩm theo category_id
Route::get('products_by_category_id/{category_id}', [tbl_ProductController::class, 'getProductsByCategoryId']);

// Route để get sản phẩm theo brand_id
Route::get('products_by_brand_id/{brand_id}', [tbl_ProductController::class, 'getProductsByBrandId']);

// Route để lấy wishlist theo user_id
Route::get('wishlists/user/{user_id}', [WishlistController::class, 'getWishlistByUserId']);

// Route để thêm sản phẩm vào wishlist
Route::post('wishlists/add', [WishlistController::class, 'addToWishlist']);

// Route để thay đổi status checkout
Route::put('checkouts-change-status/{checkout_id}', [CheckoutController::class, 'changeStatus']);
