<?php

namespace App\Providers;

use App\Interfaces\Auth\IAuthRepository;
use App\Interfaces\Blog\IBlogRespository;
use App\Interfaces\Blog\IBlogServices;
use App\Interfaces\CategoryBlog\ICategoyBlogRepository;
use App\Interfaces\CategoryBlog\ICategoyBlogServices;
use App\Interfaces\Components\IComponentsRepository;
use App\Interfaces\Components\IComponentsServices;
use App\Interfaces\ImagesBlog\IImagesBlogRepository;
use App\Interfaces\ImagesBlog\IImagesBlogServices;
use App\Interfaces\Pages\IPageInterface;
use App\Repository\Auth\AuthRepository;
use App\Repository\Blogs\BlogsRespository;
use App\Repository\CategoryBlog\CategoryBlogRepository;
use App\Repository\ImagesBlog\ImagesBlogRepository;
use App\Repository\Pages\PagesRepository;
use App\Services\Blogs\BlogsServices;
use App\Services\CategoryBlog\CategoryBlogServices;
use App\Services\Components\ComponentsServices;
use App\Services\ImagesBlog\ImagesBlogServices;
use App\Services\Pages\PagesServices;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IEjemploTaskRepository::class, EjemploTaskRepository::class);
        $this->app->bind(IEjemploTaskServices::class, EjemploTaskServices::class);

        // Repository
        $this->app->bind(IPageInterface::class, PagesRepository::class);
        $this->app->bind(IComponentsRepository::class, PagesRepository::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IBlogRespository::class, BlogsRespository::class);
        $this->app->bind(ICategoyBlogRepository::class, CategoryBlogRepository::class);
        $this->app->bind(IImagesBlogRepository::class, ImagesBlogRepository::class);
        // Services

        $this->app->bind(IComponentsServices::class, ComponentsServices::class);
        $this->app->bind(IBlogServices::class, BlogsServices::class);
        $this->app->bind(ICategoyBlogServices::class, CategoryBlogServices::class);
        $this->app->bind(IImagesBlogServices::class, ImagesBlogServices::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
