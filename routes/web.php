<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

// Livewire
use App\Livewire\Dashboard;


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/client', function (Request $request) {
    return view('client', [
        'clients' => $request->user()->clients->all(),
    ]);
})->middleware(['auth', 'verified'])->name('client');

//Admin
Route::middleware('admin')->group(function () {
    Route::get('/admin/index', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//SSO
// Route for redirecting user to the OAuth server
Route::get('/redirect', [ClientController::class, 'redirect']);

// Route for handling the callback from the OAuth server
Route::get('/auth/callback', [ClientController::class, 'callback']);

