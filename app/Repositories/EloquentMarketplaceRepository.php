<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Contracts\MarketplaceRepository;

class EloquentMarketplaceRepository implements MarketplaceRepository
{

    public function get(int $itemsPerPage, string $order, string $search = '', $category = null, $vendor = null)
    {
        $query = Product::where('products.name','like',  "%" . $search . "%" )
            ->select('products.*')
            ->when($category, function ($query, $category) {
                return $query->join('category_product', 'category_product.product_id', '=', 'products.id')
                    ->where('category_product.category_id', $category);
            })
            ->when($vendor, function ($query, $vendor) {
                return $query->join('companies', 'companies.id', '=', 'products.company_id')
                    ->where('companies.id', $vendor);
            })
            ->orderBy($order);

        return $query->paginate($itemsPerPage);
    }
}
