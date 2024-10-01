<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Passport\Http\Controllers\AuthorizationController;

// Livewire
use App\Livewire\Dashboard;


use Laravel\Passport\Http\Controllers\TokenController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/auth', function (Request $request) {
    $client = $request->user()->clients->first(); // Assuming the user has multiple clients
    return view('vendor.passport.authorize', [
        'client' => $client,
        'scopes' => [],  // You can pass the required scopes here
        'authToken' => Str::random(40),  // Replace with actual auth token
        'request' => $request
    ]);
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
Route::get('/oauth/redirect', [ClientController::class, 'redirect'])->name('oauth.redirect');
Route::get('/oauth/callback', [ClientController::class, 'callback'])->name('oauth.callback');

// Route::get('/auth/authorize', [AuthorizationController::class, 'authorizeRequest'])->name('authorize');


Route::group(['prefix' => 'oauth', 'middleware' => ['web']], function () {
    Route::get('/authorize', [AuthorizationController::class, 'authorize'])->name('passport.authorizations.authorize');
    Route::post('/token', [TokenController::class, 'issueToken'])->name('passport.token');
    Route::post('/approve', [ApproveAuthorizationController::class, 'approve'])->name('passport.authorizations.approve');
    Route::post('/deny', [DenyAuthorizationController::class, 'deny'])->name('passport.authorizations.deny');
});

