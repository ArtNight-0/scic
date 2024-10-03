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
        // Passport::token()
        Passport::useTokenModel(PassportToken::class);
        Passport::useRefreshTokenModel(PassportRefreshToken::class);
        Passport::useAuthCodeModel(PassportAuthCode::class);
        Passport::useClientModel(Client::class);
        Passport::usePersonalAccessClientModel(PassportPersonalAccessClient::class);

        Passport::loadKeysFrom(base_path('storage'));
        Passport::hashClientSecrets();

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
            Passport::enablePasswordGrant();


        
        

        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
