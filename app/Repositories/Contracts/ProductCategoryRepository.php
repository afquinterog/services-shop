<?php


namespace App\Repositories\Contracts;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductCategoryRepository
{
    public function saveMany(Product $product, array $categories): bool;

    public function save(Product $product, Category $category): bool;

    public function get(Product $product): Collection;
}
