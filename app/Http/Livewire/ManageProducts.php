<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\InteractsWithUI;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class ManageProducts extends Component
{

    use WithFileUploads, InteractsWithUI;

    public $products;

    public $categories;

    public $product;

    public $productImage;

    public $categoryId;

    public $isEditing = false;

    protected $rules = [
        'product.name' => 'required|string|min:6',
        'product.description' => 'required|string',
        'product.price' => 'required|numeric|max:10',
        'product.active' => 'required|numeric|max:1',
        'product.order' => 'required|numeric',
    ];

    public function mount()
    {
        $this->products = $this->getProducts();
        $this->categories = $this->getCategories();
    }

    public function select(Product $product=null)
    {
        $this->product = $product ?? new Product();
        $this->showEditForm(true);
    }

    public function showEditForm($show)
    {
        $this->isEditing = $show;
    }

    public function update()
    {
        $this->product->save();
        $this->product->fresh();
        $this->product->categories()->detach();
        $this->product->categories()->attach($this->categoryId);

        $this->products = $this->getProducts();
        //$this->showEditForm(false);
        $this->notification(__('Producto Guardado'),  __('Los datos del producto se guardaron correctamente') );
    }

    public function savePhoto()
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

    public function deletePhoto(ProductImage $productImage)
    {
        $productImage->delete();
        $this->product->load('images');
    }

    public function setMainPhoto(ProductImage $productImage)
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

    private function getProducts(): Collection
    {
        return Product::orderBy('name')->get();
    }

    private function getCategories(): Collection
    {
        return Category::all();
    }
}
