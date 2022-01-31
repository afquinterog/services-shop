<?php

namespace App\Providers;

use App\Models\ProductRate;
use App\Observers\ProductRateObserver;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\CompanyRepository;
use App\Repositories\Contracts\MarketplaceRepository;
use App\Repositories\Contracts\ProductCategoryRepository;
use App\Repositories\Contracts\ProductImageRepository;
use App\Repositories\Contracts\ProductOrderRepository;
use App\Repositories\Contracts\ProductRatingRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\EloquentCategoryRepository;
use App\Repositories\EloquentCompanyRepository;
use App\Repositories\EloquentMarketplaceRepository;
use App\Repositories\EloquentProductCategoryRepository;
use App\Repositories\EloquentProductImageRepository;
use App\Repositories\EloquentProductOrderRepository;
use App\Repositories\EloquentProductRatingRepository;
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
        ProductRatingRepository::class => EloquentProductRatingRepository::class,
        ProductCategoryRepository::class => EloquentProductCategoryRepository::class,
        ProductImageRepository::class => EloquentProductImageRepository::class,
        ProductOrderRepository::class => EloquentProductOrderRepository::class,
        MarketplaceRepository::class => EloquentMarketplaceRepository::class,
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
        ProductRate::observe(ProductRateObserver::class);
    }
}
