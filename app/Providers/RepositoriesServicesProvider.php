<?php

namespace App\Providers;

use App\Interfaces\Components\IComponentsRepository;
use App\Interfaces\Components\IComponentsServices;
use App\Interfaces\Pages\IPageInterface;
use App\Repository\Pages\PagesRepository;
use App\Services\Components\ComponentsServices;
use App\Services\Pages\PagesServices;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        // Repository
        $this->app->bind(IPageInterface::class, PagesRepository::class);
        $this->app->bind(IComponentsRepository::class, PagesRepository::class);
        // Services
        $this->app->bind(IComponentsServices::class, ComponentsServices::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
