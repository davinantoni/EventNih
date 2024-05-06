<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Route::get('/', function () {
//     return view('HomePage');
// });

Route::get('/', [EventController::class, 'index']);
