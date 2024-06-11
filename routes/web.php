<?php

use App\Http\Controllers\AuthController;
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
use App\Http\Middleware\EnsureUserIsAuthenticated;

// Route::get('/ShoppingCart', function () {
//     return view('ShoppingCartPage');
// });
Route::post('/ShoppingCart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity')->middleware(EnsureUserIsAuthenticated::class);
Route::post('/ShoppingCart/delete-item', [CartController::class, 'deleteItem'])->name('cart.deleteItem')->middleware(EnsureUserIsAuthenticated::class);
Route::post('/AddTransaction', [PaymentController::class, 'store'])->middleware(EnsureUserIsAuthenticated::class);
Route::post('/AddToCart', [CartController::class, 'addToCart'])->middleware(EnsureUserIsAuthenticated::class);
Route::post('/event', [EventController::class, 'store'])->middleware(EnsureUserIsAuthenticated::class);
Route::get('/CreateEvent', [EventController::class, 'create'])->middleware(EnsureUserIsAuthenticated::class);

Route::get('/Logout', [AuthController::class, 'logout'])->middleware(EnsureUserIsAuthenticated::class);
Route::get('/Login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/Login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('/Register', [RegisterController::class, 'store']);
Route::get('/Register', [RegisterController::class, 'create']);

Route::get('/CustomerService', [CustomerServiceController::class, 'index']);
Route::get('/Profile', [ProfileController::class, 'index'])->middleware(EnsureUserIsAuthenticated::class);
Route::get('/PaymentStatus', [PaymentStatusController::class, 'index'])->name('PaymentStatus')->middleware(EnsureUserIsAuthenticated::class);
Route::get('/Payment', [PaymentController::class, 'index'])->middleware(EnsureUserIsAuthenticated::class);
Route::get('/ShoppingCart', [CartController::class, 'index'])->middleware(EnsureUserIsAuthenticated::class);

Route::get('/', [EventController::class, 'index']);
Route::get('/{id}', [EventController::class, 'show']);