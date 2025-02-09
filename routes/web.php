<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\User\AuthController as UserAuthController;

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



// Login routes
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'postLogin'])->name('admin.login.post');

Route::group(['prefix' => 'admin', 'middleware' => ['Admin']], function () {
    Route::get('/', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
    
    // For category
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    
    // For product
    Route::resource('product', ProductController::class, ['as' => 'admin']);
    
    // For order
    Route::get('/order/pending', [OrderController::class, 'pending'])->name('order.pending');
    Route::get('/order/complete', [OrderController::class, 'complete'])->name('order.complete');
    Route::get('/order/complete/{id}', [OrderController::class, 'makeComplete'])->name('order.makecomplete');
    
    // For user
    Route::get('/user', [AdminPageController::class, 'alluser'])->name('admin.alluser');
    Route::get('/user/profile', [AdminPageController::class, 'profile'])->name('admin.profile');
    Route::put('/user/profile/update', [AdminPageController::class, 'profileupdate'])->name('admin.profileupdate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
});

//for normal user
Route::group(['middleware' => 'ShareData'],function(){
   
    Route::get('register',[UserAuthController::class, 'register'])->name('user.register');
    Route::post('register',[UserAuthController::class, 'Postregister'])->name('user.Postregister');
    Route::get('login',[UserAuthController::class, 'showlogin'])->name('user.showlogin');
    Route::post('login',[UserAuthController::class, 'PostLogin'])->name('user.PostLogin');
    Route::get('logout',[UserAuthController::class, 'logout'])->name('user.logout');

    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/product/category/{slug}',[PageController::class,'byCategory'])->name('byCategory');
    Route::get('/product/search',[PageController::class, 'search'])->name('search');
    Route::get('/product/{slug}', [PageController::class, 'productDetails'])->name('productDetails');
    Route::get('/product/cart/add/{slug}', [PageController::class,'addToCart']);
    Route::get('/cart',[PageController::class, 'cart'])->name('cart');
    Route::get('/order/make',[PageController::class, 'makeOrder'])->name('makeOrder');
    Route::get('/order/pending',[PageController::class, 'pendingOrder'])->name('pendingOrder');
    Route::get('/order/complete',[PageController::class, 'completeOrder'])->name('completeOrder');
    Route::get('/profile',[PageController::class, 'userprofile'])->name('userprofile');
    Route::post('/profile',[PageController::class, 'changeprofile'])->name('changeprofile');
});



   

