<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[HomeController::class,'show_home_page'])->name('user.home_page');
Route::get('/room_detail/{id}',[HomeController::class,'show_room_detail'])->name('user.room_detail');
Route::get('/service_detail/{id}',[HomeController::class,'show_service_detail'])->name('user.service_detail');
Route::get('/room',[HomeController::class,'show_room'])->name('user.room');
Route::get('/service',[HomeController::class,'show_service'])->name('user.service');
Route::get('/feed_back',[HomeController::class,'show_feedBack'])->name('user.feed_back');
Route::post('addfeedback',[HomeController::class,'add_feedBack'])->name('user.addfeed_back');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('cart',[CartController::class, 'cartList'])->name('cart.list');
Route::post('cart',[CartController::class,'addToCart'])->name('cart.store');
Route::post('add-service-to-cart',[CartController::class,'addServiceToCart'])->name('cart.addService');
Route::post('update-cart',[CartController::class,'updateCart'])->name('cart.update');
Route::post('remove',[CartController::class,'removeCart'])->name('cart.remove');
Route::post('clear',[CartController::class,'clearAllCart'])->name('cart.clear');

Route::get('/payment',[PaymentController::class,'Payment'])->name('payment');
Route::post('/payment/add',[PaymentController::class,'Add'])->name('add');
Route::get('/payment/vnPayCheck', [PaymentController::class, 'vnPayCheck'])->name('checkout.vnpay');

