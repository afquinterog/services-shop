<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Scopes\CompanyScope;
use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function index(Request $request)
    {
        return view('marketplace', [
            'pageTitle' => __('Marketplace Shop'),
            'metaDescription' => __('The best products marketplace'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $product = Product::withoutGlobalScope(CompanyScope::class)->findOrFail($id);

        $pageTitle = "Marketplace " . $product->name;

        return view('product-detail', compact('product', 'pageTitle'));
    }


    /**
     * Display the specified resource.
     */
    public function details(Request $request, $slug)
    {
        $product = Product::withoutGlobalScope(CompanyScope::class)->where('slug', $slug)->first();
        return $this->show($request, $product->id);
    }
}
