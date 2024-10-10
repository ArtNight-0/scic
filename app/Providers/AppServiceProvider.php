<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

use App\Models\Passport\Client;
use Laravel\Passport\AuthCode as PassportAuthCode;
use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;
use Laravel\Passport\RefreshToken as PassportRefreshToken;
use Laravel\Passport\Token as PassportToken;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
