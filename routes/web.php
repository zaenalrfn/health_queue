<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\QueueController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// route admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //  route services
    Route::get('services', [ServicesController::class, 'index'])->name('admin.services.index');
    Route::post('services', [ServicesController::class, 'store'])->name('admin.services.store');
    Route::get('services-edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
    Route::put('services-update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
    Route::delete('services-delete/{id}', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
    // route queue
    Route::get('queue', [QueueController::class, 'index'])->name('admin.queue.index');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
