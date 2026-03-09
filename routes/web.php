<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\BookingController; 


Route::view('/', 'landingpage')->name('home');

// Audit Routes
Route::get('/audit', [AuditController::class, 'create'])->name('audit.create');
Route::post('/audit', [AuditController::class, 'store'])->name('audit.store');

// Booking Routes
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
