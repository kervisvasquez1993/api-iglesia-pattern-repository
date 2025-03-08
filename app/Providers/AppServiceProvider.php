<?php

namespace App\Providers;

use App\Policies\AuthRolePolici;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        // Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');
        Gate::define('validate-role', [AuthRolePolici::class, 'ValidateAdmin']);
    }
}
