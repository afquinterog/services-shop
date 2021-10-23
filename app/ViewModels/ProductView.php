<?php


namespace App\ViewModels;

use App\Helpers\UI\Utils;
use App\Models\Product;

class ProductView
{
    public $product = null;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function getFormattedPrice()
    {
        return Utils::formatValue($this->product->price);
    }

}
