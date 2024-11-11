<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\TokenController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SSO\SSOController;

// Livewire
use App\Livewire\DashboardManagement;
use App\Livewire\Dashboard;
use App\Livewire\Users;
use App\Livewire\ApiUserComponent;


Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/auth', function (Request $request) {
//     $client = $request->user()->clients;
//     return view('vendor.passport.authorize', [
//         'client' => $client,
//         'scopes' => [],
//         'authToken' => Str::random(40),
//         'request' => $request
//     ]);
// });

Route::get('/manajemen-user', ApiUserComponent::class)->middleware(['auth', 'verified'])->name('management-user');

Route::get('/manajemen-dashboard', DashboardManagement::class)->middleware(['auth','verified'])->name('dashboard-managment');

Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user', Users::class)->middleware(['auth', 'verified'])->name('user');

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
    // perubahan
    Route::get('/profiles', [ProfileController::class, 'show'])->name('profiles');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//SSO
// Route::get('/redirect', [ClientController::class, 'redirect'])->name('oauth.redirect');
// Route::get('/auth/callback', [ClientController::class, 'callback'])->name('oauth.callback');

// Route::get('/auth/authorize', [AuthorizationController::class, 'authorizeRequest'])->name('authorize');


Route::group(['prefix' => 'oauth', 'middleware' => ['web']], function () {
    Route::get('/authorize', [AuthorizationController::class, 'authorize'])->name('passport.authorizations.authorize');
    Route::post('/token', [AccessTokenController::class, 'issueToken'])->name('passport.token');
    Route::post('/approve', [ApproveAuthorizationController::class, 'approve'])->name('passport.authorizations.approve');
    Route::post('/deny', [DenyAuthorizationController::class, 'deny'])->name('passport.authorizations.deny');
});
//SSO Controller
Route::get("/sso/login", [SSOController::class, 'getLogin'])->name("sso.login");
Route::get("/auth/callback", [SSOController::class, 'getCallback'])->name("sso.callback");
Route::get("/sso/connect", [SSOController::class, 'connectUser'])->name("sso.connect");

Route::middleware(['checkSSOToken'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

});


// Auth::routes(['register' => false, 'reset' => false ]);

// Tes sso Google
