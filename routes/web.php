<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\AdminController;

// ── Halaman undangan ───────────────────────────────────────────
Route::get('/', [InvitationController::class, 'index'])->name('invitation');

// ── RSVP & Ucapan ─────────────────────────────────────────────
Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

// ── Admin ──────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Login (tanpa middleware)
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Protected routes
    Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::delete('/rsvp/{rsvp}', [AdminController::class, 'destroy'])->name('rsvp.destroy');
        Route::delete('/rsvp', [AdminController::class, 'destroyAll'])->name('rsvp.destroyAll');
    });
});