<?php
namespace App\Repositories\Contracts;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRateRepository
{


    public function rate(Product $product, int $rate);

    public function getRatings(Product $product): Collection;

    /**
     * Calculate the product average rating
     */
    public function calculate(Product $product) : void;
}
