<?php

namespace App\Observers;

use App\Models\ProductRate;

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
        //
    }

    /**
     * Handle the ProductRate "updated" event.
     *
     * @param  \App\Models\ProductRate  $productRate
     * @return void
     */
    public function updated(ProductRate $productRate)
    {
        //
    }

    /**
     * Handle the ProductRate "deleted" event.
     *
     * @param  \App\Models\ProductRate  $productRate
     * @return void
     */
    public function deleted(ProductRate $productRate)
    {
        //
    }

    /**
     * Handle the ProductRate "restored" event.
     *
     * @param  \App\Models\ProductRate  $productRate
     * @return void
     */
    public function restored(ProductRate $productRate)
    {
        //
    }

    /**
     * Handle the ProductRate "force deleted" event.
     *
     * @param  \App\Models\ProductRate  $productRate
     * @return void
     */
    public function forceDeleted(ProductRate $productRate)
    {
        //
    }
}
