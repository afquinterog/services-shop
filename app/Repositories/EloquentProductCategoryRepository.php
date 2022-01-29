<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use App\Repositories\Contracts\ProductCategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;

class EloquentProductCategoryRepository implements ProductCategoryRepository
{

    public function save(Product $product, Category $category): bool
    {
        //Gate::authorize('create', Product::class);
        return $this->saveMany($product, [$category->id]);
    }

    public function saveMany(Product $product, array $categories): bool
    {
        $product->save();
        $product->fresh();
        $product->categories()->detach();
        $product->categories()->attach($categories);

        return true;
    }

    public function get(Product $product): Collection
    {
        return $product->categories()->get();
    }
}
