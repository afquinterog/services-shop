<?php


namespace App\Repositories\Contracts;


use App\Models\Product;

interface ProductCategoryRepository
{
    public function save(Product $product, array $categories): bool;
}
