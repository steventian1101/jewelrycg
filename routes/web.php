<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AppController::class, 'index'])->name('index');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::middleware(['auth', 'admin'])->resource('products', ProductController::class)->except(['index', 'show']);
Route::resource('products', ProductController::class)->only('show');

Route::group([
    'controller' => CartController::class,
    'prefix' => 'cart',
    'as' => 'cart.'
], function() {
    Route::group(['middleware' => 'auth'], function() {
        Route::middleware('verified')->post('/buy-now', 'buyNow')->name('buy.now');

        Route::group(['prefix' => 'wishlist', 'as' => 'wishlist'], function() {
            Route::get('/', 'wishlist');
            Route::post('/', 'wishlistStore');
            Route::put('/', 'wishlistToCart');
            Route::delete('/', 'removeFromWishlist');
        });
    });
    Route::patch('/edit', 'editQty')->name('edit.qty');
    Route::patch('/remove', 'removeProduct')->name('remove.product');
});
Route::resource('cart', CartController::class)->only(['index', 'store']);

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'email/verify', 'as' => 'verification.', 'controller' => VerifyEmailController::class], function() {
        Route::get('/', 'emailVerificationNotice')->name('notice');
        Route::get('/{id}/{hash}', 'verificationHandler')->middleware('signed')->name('verify');
    });
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    Route::group(['prefix' => 'payment', 'as' => 'checkout.', 'controller' => CheckoutController::class], function() {
        Route::get('/finished', 'paymentFinished')->name('finished');
        Route::delete('/cancel', 'cancel')->name('cancel');
    });
    Route::group(['middleware' => ['checkout', 'verified']], function() {
        Route::resource('checkout', CheckoutController::class)->only(['index', 'store']);
        Route::post('/payment/intent', [CheckoutController::class, 'createPaymentIntent'])->name('checkout.payment.intent');
    });

    Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
    
    Route::group(['prefix' => 'user', 'as' => 'user.', 'controller' => UserController::class], function() {
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/edit/password', 'editPassword')->name('edit.password');
        Route::patch('/edit/password', 'updatePassword')->name('update.password');
        Route::put('/edit', 'update')->name('update');
        Route::delete('/delete', 'delete')->name('delete');
        Route::get('/{id_user}', 'index')->name('index');
    });
});


require __DIR__.'/auth.php';
