<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\OrderController;

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

Route::get('/', [App\Http\Controllers\User\HomeController::class,'index']);
Route::get('/books', [App\Http\Controllers\User\BookController::class,'index'])->name('user.books');
Route::get('/cart', [App\Http\Controllers\User\CartController::class,'index'])->name('user.cart');
Route::get('/checkout', [App\Http\Controllers\User\CheckoutController::class,'index'])->name('user.checkout');
Route::get('/thanks/{id}', [App\Http\Controllers\User\ThanksController::class,'show'])->name('user.thanks');
Route::post('/order', [App\Http\Controllers\User\OrderController::class,'store'])->name('user.order');
Route::get('/book/{id}', [App\Http\Controllers\User\DetailController::class,'show'])->name('user.detail');

Route::get('/login', [App\Http\Controllers\User\LoginController::class,'show'])->name('user.login.show');
Route::post('/login', [App\Http\Controllers\User\LoginController::class,'login'])->name('user.login.perform');

Route::get('/register', [App\Http\Controllers\User\RegisterController::class,'show'])->name('user.register.show');
Route::post('/register', [App\Http\Controllers\User\RegisterController::class,'register'])->name('user.register.perform');

Route::get('/logout', [App\Http\Controllers\User\LogoutController::class,'perform'])->name('user.logout.perform');

Route::group([
    'prefix'     => 'account',
    'middleware'     => ['auth','user'],
], function () {
    Route::get('/', [App\Http\Controllers\User\AccountController::class,'index'])->name('user.account');
    Route::get('/order/{id}', [App\Http\Controllers\User\AccountController::class,'show'])->name('user.account.show');
    Route::get('/address', [App\Http\Controllers\User\AccountController::class,'showInfo'])->name('user.account.show.info');
    Route::post('/address', [App\Http\Controllers\User\AccountController::class,'updateInfo'])->name('user.account.update.info');
});


Route::group([
    'prefix'     => 'manages',
    'middleware'     => ['auth','admin'],
], function () {
    Route::resource('/', ManageController::class)->names([
        'index' => 'manages.index'
    ]);

    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('books', BookController::class);
    Route::resource('orders', OrderController::class);
});

