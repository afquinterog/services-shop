<?php
namespace App\Repositories\Contracts;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRatingRepository
{
    public function save(Product $product, int $rate, string $message='');

    public function get(Product $product): Collection;

    /**
     * Calculate the product average rating
     */
    public function calculate(Product $product) : void;
}
