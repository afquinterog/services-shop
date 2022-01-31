<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ShopController extends Controller
{

    protected $productRepository;


    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $company = Company::findOrFail($request->session()->get('company_id'));
        //Get categories and products from service
        $categories = resolve(CategoryRepository::class)->all();

        return view('web', [
            'company_id' => $company->id,
            'categories' => $categories,
            'pageTitle' => $company->name,
            'metaDescription' => $company->meta_description,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $company = Company::findOrFail($request->session()->get('company_id'));
        $product = Product::findOrFail($id);

        $pageTitle = $company->name . " " . $product->name ;

        return view('product-detail', compact('product', 'pageTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function details(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return $this->show($request, $product->id);
    }
}
