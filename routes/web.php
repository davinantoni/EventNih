<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentStatusController;

// Route::get('/ShoppingCart', function () {
//     return view('ShoppingCartPage');
// });

Route::get('/PaymentStatus', [PaymentStatusController::class, 'index']);
Route::get('/Payment', [PaymentController::class, 'index']);
Route::get('/ShoppingCart', [CartController::class, 'index']);
Route::get('/', [EventController::class, 'index']);
Route::get('/{id}', [EventController::class, 'show']);




