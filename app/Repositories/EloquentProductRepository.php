<?php

namespace App\Repositories;

use App\Events\OrderCreated;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class EloquentProductRepository implements ProductRepository
{

    public function save(Product $product): bool
    {
        Gate::authorize('create', Product::class);
        return $product->save();
    }

    public function all(): Collection
    {
        return self::orderBy('order');
    }

    public function orderBy(string $order): Collection
    {
        return Product::orderBy($order)->get();
    }
}
