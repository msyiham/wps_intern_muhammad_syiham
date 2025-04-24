<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DailyNoteController;
use App\Http\Controllers\StaffManagerController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// ADMIN AREA
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/assign-staff', [StaffManagerController::class, 'index'])->name('staff-manager.index');
    Route::post('/assign-staff', [StaffManagerController::class, 'store'])->name('staff-manager.store');
    Route::post('/store-user', [UsersController::class, 'store'])->name('store-user');
    Route::get('/create-user', [UsersController::class, 'create'])->name('create-user');
});

// USER BIASA AREA (staff, manager, director)
Route::middleware(['auth', 'role:staff|manager|director'])->prefix('user')->name('user.')->group(function () {
    // Upload (semua user bisa)
    Route::get('/daily-notes', [DailyNoteController::class, 'index'])->name('daily-note.index');
    Route::get('/daily-note', [DailyNoteController::class, 'create'])->name('daily-note.create');
    Route::post('/daily-note', [DailyNoteController::class, 'store'])->name('daily-note.store');
    Route::get('/daily-note/{id}/edit', [DailyNoteController::class, 'edit'])->name('daily-note.edit');
    Route::put('/daily-note/{id}', [DailyNoteController::class, 'update'])->name('daily-note.update');
    Route::delete('/user/daily-note/{id}', [DailyNoteController::class, 'destroy'])->name('daily-note.destroy');


    // Review
    Route::get('/review/daily-notes', [DailyNoteController::class, 'indexReviewer'])->name('daily-note.review');
    Route::put('/review/daily-note/{note}', [DailyNoteController::class, 'updateStatus'])->name('daily-note.update-status');
    // Tambah route lain untuk user di sini...
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
