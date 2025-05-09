<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

Route::get('/services', [ServiceController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
