<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CreateEventController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

// Route::get('/ShoppingCart', function () {
//     return view('ShoppingCartPage');
// });
Route::post('/ShoppingCart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::post('/ShoppingCart/delete-item', [CartController::class, 'deleteItem'])->name('cart.deleteItem');
Route::post('/AddTransaction', [PaymentController::class, 'store']);
Route::post('/AddToCart', [CartController::class, 'addToCart']);
Route::post('/event', [EventController::class, 'store']);
Route::get('/CreateEvent', [EventController::class, 'create']);

Route::get('/Login', [LoginController::class, 'index']);
Route::get('/Register', [RegisterController::class, 'index']);
Route::get('/CustomerService', [CustomerServiceController::class, 'index']);
Route::get('/Profile', [ProfileController::class, 'index']);
Route::get('/PaymentStatus', [PaymentStatusController::class, 'index'])->name('PaymentStatus');
Route::get('/Payment', [PaymentController::class, 'index']);
Route::get('/ShoppingCart', [CartController::class, 'index']);

Route::get('/', [EventController::class, 'index'])->middleware('auth');
Route::get('/{id}', [EventController::class, 'show']);





