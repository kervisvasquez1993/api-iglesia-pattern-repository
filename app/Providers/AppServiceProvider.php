<?php

namespace App\Providers;

use App\Policies\AuthRolePolici;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;

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
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
          Passport::loadKeysFrom(app_path('secrets/oauth'));
        // Definir la duración de los tokens
        Passport::tokensExpireIn(Carbon::now()->addMinutes(1)); // 🔹 Expira en 1 minuto
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(2)); 
        Gate::define('validate-role', [AuthRolePolici::class, 'ValidateAdmin']);
     
    }
}
