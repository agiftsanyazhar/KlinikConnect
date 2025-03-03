<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/pengumuman', [DashboardController::class, 'announcement'])->name('announcement');

Route::prefix('daftar-dokter')->name('doctor.')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('index');

    Route::prefix('jadwal')->name('schedule.')->group(function () {
        Route::get('/{id}', [DoctorScheduleController::class, 'index'])->name('index');
        Route::post('/', [AppointmentController::class, 'store'])->name('store');
        Route::post('/update-status/{id}', [AppointmentController::class, 'updateStatus'])->name('update-status');
    });
});

Route::prefix('janji-temu-saya')->name('appointment.')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
});
