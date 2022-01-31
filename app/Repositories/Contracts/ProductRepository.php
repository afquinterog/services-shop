<?php


namespace App\Repositories\Contracts;


use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface  ProductRepository
{
    public function save(Product $product): bool;

    public function all(): Collection;

    public function orderBy(string $order): Collection;
}

