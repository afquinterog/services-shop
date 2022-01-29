<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Contracts\ProductCategoryRepository;

class EloquentProductCategoryRepository implements ProductCategoryRepository
{

    public function save(Product $product, array $categories): bool
    {
        $product->save();
        $product->fresh();
        $product->categories()->detach();
        $product->categories()->attach($categories);

        return true;
    }
}
