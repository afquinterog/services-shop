<?php


namespace App\Repositories;


use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Contracts\ProductOrderRepository;

class EloquentProductOrderRepository implements ProductOrderRepository
{

    public function save(Product $product, Order $order): void
    {
        $product->orders()->save($order);

        //Dispatch event order added
        OrderCreated::dispatch($order);
    }
}
