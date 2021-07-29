<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ShopUserController;

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

\Debugbar::enable();
// \Debugbar::disable();

Route::get('/', function() {
    return redirect('/home');
});

Auth::routes();

    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {

        Route::get('/home', [AdminPageController::class, 'index'])->name('admin.index');

        Route::group(['prefix' => 'pages'], function() {

            Route::get('/create', [AdminPageController::class, 'createProduct'])
                    ->name('admin.pages.product.create');

            Route::post('product/product-store', [ProductController::class, 'store']);
            Route::put('product-update/{id}', [ProductController::class, 'update']);
            Route::delete('product-delete/{id}', [ProductController::class, 'destroy']);

            Route::get('product/product-table', [AdminPageController::class, 'productTable'])
                    ->name('admin.pages.product.index');

            Route::get('category/all-category', [AdminPageController::class, 'addCategory'])
                    ->name('admin.pages.category.index');

            Route::get('/visitors/visitor', [AdminPageController::class, 'visitor'])
                    ->name('admin.pages.visitor.index');

            Route::delete('visitor-delete/{id}', [AdminPageController::class, 'deleteVisitor']);
        });
    });

Route::group(['middleware' => 'detectSiteVisitors'], function() {

    Route::get('/home', [PageController::class, 'index'])->name('front.index');
    Route::get('/search', [PageController::class, 'search'])->name('front.search.index');
    
    Route::get('/product/view/{product_id}/{name}', [PageController::class, 'show'])
                ->name('front.show.index')
                ->middleware('countProductView');
    
    Route::get('/category/{name}', [PageController::class, 'category'])
                ->name('front.category.index');
    
    Route::group(['middleware' => 'auth:shop_user', 'prefix' => 'account'], function() {

        Route::get('/dashboard', [ShopUserController::class, 'dashboard'])
                    ->name('front.account.dashboard');
        
        Route::get('/orders', [ShopUserController::class, 'order'])
                    ->name('front.account.order');

        Route::get('/wishlist', [ShopUserController::class, 'myWishlist'])
                    ->name('front.account.wishlist');
        
        Route::get('/my/cart', [ShopUserController::class, 'myCart'])
                    ->name('front.account.cart');
        
        Route::get('/address', [ShopUserController::class, 'address'])
                    ->name('front.account.address');
        
        Route::get('/product/order/checkout', [ShopUserController::class, 'checkout'])
                    ->name('front.account.checkout.index');

    });

});

    // set up shop user auth routes
    Route::get('/auth/shop/login', [LoginController::class, 'shopUserLoginPage'])
                ->name('auth.shop_user_login');
    
    Route::post('/auth/shop/login', [LoginController::class, 'shopUserLogin'])
                ->name('auth.shop_login'); 
    
    Route::post('/auth/shop/user/logout', [LoginController::class, 'logoutShopUser'])
                ->name('auth.logout_shop_user'); 
    
    Route::get('/auth/shop/register', [RegisterController::class, 'showShopUserRegisterPage'])
                ->name('auth.shop_user_register'); 

    Route::post('/auth/shop/register', [RegisterController::class, 'createShopUser'])
                ->name('auth.shop_user_register');

