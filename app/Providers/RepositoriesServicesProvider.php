<?php

namespace App\Providers;

use App\Interfaces\Auth\IAuthRepository;
use App\Interfaces\Blog\IBlogRespository;
use App\Interfaces\Blog\IBlogServices;
use App\Interfaces\Components\IComponentsRepository;
use App\Interfaces\Components\IComponentsServices;
use App\Interfaces\Pages\IPageInterface;
use App\Repository\Auth\AuthRepository;
use App\Repository\Blogs\BlogsRespository;
use App\Repository\Pages\PagesRepository;
use App\Services\Blogs\BlogsServices;
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
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IBlogRespository::class, BlogsRespository::class);
        // Services
        $this->app->bind(IComponentsServices::class, ComponentsServices::class);
        $this->app->bind(IBlogServices::class, BlogsServices::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
