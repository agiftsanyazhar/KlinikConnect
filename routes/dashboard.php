<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/announcement', [DashboardController::class, 'announcement'])->name('announcement');

Route::prefix('daftar-dokter')->name('doctor.')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('index');
    // Route::get('/upcoming', [AppointmentController::class, 'upcoming'])->name('upcoming');
    // Route::post('/store', [AppointmentController::class, 'store'])->name('store');
    // Route::post('/update', [AppointmentController::class, 'update'])->name('update');
    // Route::get('/destroy/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
});

Route::prefix('janji-temu-saya')->name('appointment.')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
    // Route::get('/upcoming', [AppointmentController::class, 'upcoming'])->name('upcoming');
    // Route::post('/store', [AppointmentController::class, 'store'])->name('store');
    // Route::post('/update', [AppointmentController::class, 'update'])->name('update');
    // Route::get('/destroy/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
});
