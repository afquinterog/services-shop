<?php

namespace App\Http\Livewire;

use App\Helpers\UI\Utils;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class ManageProducts extends Component
{
    use WithFileUploads;

    public $products;

    public $categories;

    public $product;

    public $productImage;

    public $categoryId;

    public $isEditingProduct = false;

    protected $rules = [
        'product.name' => 'required|string|min:6',
        'product.description' => 'required|string',
        'product.price' => 'required|numeric|max:10',
        'product.active' => 'required|numeric|max:1',
        'product.order' => 'required|numeric',
    ];

    protected $listeners = ['new-product' => 'productNew'];

    public function mount()
    {
        $this->products = Product::all();
        $this->categories = Category::all();

        $this->count = 0;
        Utils::formatValue("20000");
    }

    public function editProduct(Product $product)
    {
        $this->showEditProductForm(true);
        $this->product = $product;
    }

    public function showEditProductForm($show)
    {
        $this->isEditingProduct = $show;
    }

    public function productNew()
    {
        $this->showEditProductForm(true);
        $this->product = new Product();
    }

    public function updateProduct()
    {
        $this->product->save();
        $this->product->fresh();
        $this->product->categories()->detach();
        $this->product->categories()->attach($this->categoryId);

        $this->products = Product::all();
        $this->showEditProductForm(false);
    }

    public function saveProductPhoto()
    {
        $this->validate([
            'productImage' => 'image',
        ]);

        $storagePath = Auth::user()->companies()->first()->id . '';
        $path = $this->productImage->store($storagePath, 's3');
        $this->product->images()->create([
            'route' => $path,
            'order' => 2
        ]);

        $this->product->load('images');
    }

    public function deleteProductPhoto(ProductImage $productImage)
    {
        $productImage->delete();
        $this->product->load('images');
    }

    public function setProductMainPhoto(ProductImage $productImage)
    {
        $this->product->images()->each(function ($image){
            $image->order = 2;
            $image->save();
        });

        $productImage->order = 1;
        $productImage->save();
        $this->product->load('images');
    }

    public function render()
    {
        return view('livewire.manage-products',[
            'products' => $this->products
        ]);
    }
}
