<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;



use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrdersController;







//Route::get('/', function () {
    //return view('frontend.frontend-master');
//});

      Route::get('/',[FrontendController::class,'index']);


//=====================Frontend Route========================//
Route::get('product/details/{product_id}', [FrontendController::class,'productDetails']);
Route::get('shop', [FrontendController::class,'shopPage']);
Route::get('category/product-show/{id}', [FrontendController::class,'catWiseProduct']);

 //---------------Search Controller------------//
Route::get('search-product', [SearchController::class,'searchProduct']);
Route::post('find-product', [SearchController::class,'findProduct']);






 
   



//--------Backend Route-------------
    Route::get('admin/login', [AdminController::class,'adminLoginForm']);
    Route::post('admin-login', [AdminController::class,'adminLogin']);


    Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class,'adminDashboard']);
    Route::get('admin/logout', [AdminController::class,'adminLogout']);
   

  });

  
//--------End Backend Route----------

//------------------Admin Route-----------------//

 //........Category..........//
 Route::get('admin/category',[CategoryController::class,'index']);
 Route::post('admin/category-store',[CategoryController::class,'storeCategory']);
 Route::get('admin/category/edit/{id}',[CategoryController::class,'editCategory']);
 Route::post('admin/category/update',[CategoryController::class,'updateCategory']);
 Route::get('admin/category/delete/{id}',[CategoryController::class,'deleteCategory']);
 Route::get('admin/category/inactive/{id}',[CategoryController::class,'inactiveCategory']);
 Route::get('admin/category/active/{id}',[CategoryController::class,'activeCategory']);
//............End Category Route..............//



 //........Start Brand Route..........//
  Route::get('admin/brand', [BrandController::class,'index']);
 Route::post('admin/brand/store',[BrandController::class,'storeBrand']);
 Route::get('admin/brand/edit/{id}',[BrandController::class,'editBrand']);
 Route::post('admin/brand/update',[BrandController::class,'updateBrand']);
 Route::get('admin/brand/delete/{id}',[BrandController::class,'deleteBrand']);
 Route::get('admin/brand/inactive/{id}',[BrandController::class,'inactiveBrand']);
 Route::get('admin/brand/active/{id}',[BrandController::class,'activeBrand']);
//............End Brand Route..............//



//---------------Start Product Route--------------------------//
Route::get('admin/product/add', [ProductController::class,'addProduct']);
//Route::get('admin/product', [ProductController::class,'index']);
Route::post('admin/product/store',[ProductController::class,'storeProduct']);
Route::get('admin/product/manage',[ProductController::class,'manageProduct']);
Route::get('admin/product/edit/{id}',[ProductController::class,'editProduct']);
Route::post('admin/product/update',[ProductController::class,'updateProduct']);
Route::post('admin/product/image-update',[ProductController::class,'updateImage']);
Route::get('admin/product/delete/{id}',[ProductController::class,'deleteProduct']);
Route::get('admin/product/inactive/{id}',[ProductController::class,'inactiveProduct']);
Route::get('admin/product/active/{id}',[ProductController::class,'activeProduct']);

//---------------End Product Route---------------------------//



 //........Start Coupon Route..........//
 Route::get('admin/coupon', [CouponController::class,'index']);
 Route::post('admin/coupon/store',[CouponController::class,'storeCoupon']);
 Route::get('admin/coupon/edit/{id}',[CouponController::class,'editCoupon']);
 Route::post('admin/coupon/update',[CouponController::class,'updateCoupon']);
 Route::get('admin/coupon/delete/{id}',[CouponController::class,'deleteCoupon']);
 Route::get('admin/coupon/inactive/{id}',[CouponController::class,'inactiveCoupon']);
 Route::get('admin/coupon/active/{id}',[CouponController::class,'activeCoupon']);
//............End Coupon Route..............//

//................Order Route
Route::get('admin/orders', [OrdersController::class,'orderIndex']);
Route::get('admin/order/view/{id}', [OrdersController::class,'viewOrder']);


//---------------End Admin Route-----------------//



//==========================Start Frontend Route=====================//
   //=================Cart Route========================//
Route::post('add/to-cart/{product_id}', [CartController::class,'addToCart']);
Route::get('cart', [CartController::class,'cartPage']);
Route::get('cart/destroy/{cart_id}', [CartController::class,'destroy']);
Route::post('cart/quantity/update/{cart_id}',[CartController::class,'quantityUpdate']);
Route::post('coupon/apply', [CartController::class,'applyCoupon']);
Route::get('coupon/destroy', [CartController::class,'couponDestroy']);



//======================Wishlist Route========================//
Route::post('add/to-wishlist/{product_id}', [WishlistController::class,'addToWishlist']);
Route::get('wishlist', [WishlistController::class,'wishlistPage']);
Route::get('wishlist/destroy/{wishlist_id}', [WishlistController::class,'destroy']);










//======================Checkout Route========================//
Route::get('checkout', [CheckoutController::class,'index']);

Route::post('place/order', [OrderController::class,'storeOrder']);

Route::get('order/success', [OrderController::class,'orderSuccess']);

//==========================End Frontend Route=====================//

 // -------------User Route
 Route::get('user/order', [UserController::class,'userOrder']);
Route::get('user/order-view/{id}', [UserController::class, 'orderView']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
