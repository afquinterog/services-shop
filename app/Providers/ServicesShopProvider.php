<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\CompanyRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentCompanyRepository;
use App\Repositories\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

class ServicesShopProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        CompanyRepository::class => EloquentCompanyRepository::class,
        CategoryRepository::class => EloquentCategoryRepository::class,
        ProductRepository::class => EloquentProductRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
