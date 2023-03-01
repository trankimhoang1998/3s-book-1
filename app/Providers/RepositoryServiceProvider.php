<?php


namespace App\Providers;


use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

use App\Repositories\Eloquent\TagRepository;
use App\Repositories\Interfaces\TagRepositoryInterface;

use App\Repositories\Eloquent\BookRepository;
use App\Repositories\Interfaces\BookRepositoryInterface;

use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;

use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
