<?php


namespace App\Repositories;


use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Repositories\Contracts\MarketplaceRepository;
use App\Scopes\CompanyScope;

class EloquentMarketplaceRepository implements MarketplaceRepository
{

    public function get(int $itemsPerPage, string $order, string $search = '', $category = null, $vendor = null)
    {
        $query = Product::withoutGlobalScope(CompanyScope::class)
            ->where('products.name','like',  "%" . $search . "%" )
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

    public function categories()
    {
        return Category::withoutGlobalScope(CompanyScope::class)->get();
    }

    public function vendors()
    {
        return Company::all();
    }
}
