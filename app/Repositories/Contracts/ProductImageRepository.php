<?php


namespace App\Repositories\Contracts;


use App\Models\Product;
use App\Models\ProductImage;

interface ProductImageRepository
{
    public function save(Product $product, $productImage): bool;

    public function delete(ProductImage $productImage): void;

    public function refresh(Product $product): Product;

    public function setFeatured(Product $product, ProductImage $productImage): void;
}
