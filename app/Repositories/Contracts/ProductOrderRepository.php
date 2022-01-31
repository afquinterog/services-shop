<?php


namespace App\Repositories\Contracts;


use App\Models\Order;
use App\Models\Product;

interface ProductOrderRepository
{
    public function save(Product $product, Order $order): void;
}
