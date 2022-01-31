<?php


namespace App\Repositories;


use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Contracts\ProductImageRepository;
use Illuminate\Support\Facades\Auth;

class EloquentProductImageRepository implements ProductImageRepository
{

    public function save(Product $product, $productImage): bool
    {
        $path = $productImage->store($this->getStoragePath(), 's3');

        $product->images()->create([
            'route' => $path,
            'order' => 2 //Keep featured images as order:1
        ]);

        return true;
    }

    public function refresh(Product $product): Product
    {
        return $product->load('images');
    }

    public function getStoragePath()
    {
        return Auth::user()->companies()->first()->id . '';
    }

    public function delete(ProductImage $productImage): void
    {
        $productImage->delete();
    }

    public function setFeatured(Product $product, ProductImage $productImage): void
    {
        $product->images()->each(function ($image) {
            $image->order = 2;
            $image->save();
        });

        $productImage->order = 1;
        $productImage->save();
    }
}
