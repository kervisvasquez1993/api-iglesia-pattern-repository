<?php

namespace App\Providers;

use App\Interfaces\Pages\IPageInterface;
use App\Services\Pages\PagesServices;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(IPageInterface::class, PagesServices::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
