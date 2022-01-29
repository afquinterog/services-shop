<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductRate;
use App\Repositories\Contracts\ProductRateRepository;

class ProductRateObserver
{

    /**
     * Handle the ProductRate "created" event.
     *
     * @param  \App\Models\ProductRate  $productRate
     * @return void
     */
    public function created(ProductRate $productRate)
    {
        $this->calculateRate($productRate->product);
    }

    private function calculateRate(Product $product): void
    {
        /* @var ProductRateRepository $productRateRepository */
        $productRateRepository = resolve(ProductRateRepository::class);

        //Calculate rate for product
        $productRateRepository->calculate($product);
    }
}
