<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\InteractsWithUI;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductCategoryRepository;
use App\Repositories\Contracts\ProductImageRepository;
use App\Repositories\Contracts\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use Livewire\WithFileUploads;
use Livewire\Component;

class ManageProducts extends Component
{
    use WithFileUploads, InteractsWithUI;

    public $products;

    public $categories;

    public $product;

    public $actualCategory;

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

    public function select(
        CategoryRepository $categoryRepository,
        ProductCategoryRepository $productCategoryRepository,
        Product $product = null)
    {
        $this->product = $product ?? new Product();
        $this->categoryId = $productCategoryRepository->get($product)->first()->id ?? "";
        $this->showEditForm(true);
    }

    public function showEditForm($show)
    {
        $this->isEditing = $show;
    }

    public function update(ProductCategoryRepository $productCategoryRepository)
    {
        $productCategoryRepository->save($this->product, Category::find($this->categoryId));
        $this->products = $this->getProducts();
        $this->notification(__('Product Stored'), __('Product information stored properly'));
    }

    public function savePhoto(ProductImageRepository $productImageRepository)
    {
        $this->validate([
            'productImage' => 'image',
        ]);

        $productImageRepository->save($this->product, $this->productImage);
        $this->product = $productImageRepository->refresh($this->product);
    }

    public function deletePhoto(ProductImageRepository $productImageRepository, ProductImage $productImage)
    {
        $productImageRepository->delete($productImage);
        $this->product = $productImageRepository->refresh($this->product);
    }

    public function setMainPhoto(ProductImageRepository $productImageRepository, ProductImage $productImage)
    {
        $productImageRepository->setFeatured($this->product, $productImage);
        $this->product = $productImageRepository->refresh($this->product);
    }

    public function render()
    {
        return view('livewire.manage-products', [
            'products' => $this->products
        ]);
    }

    private function getProducts(): Collection
    {
        /* @var \App\Repositories\Contracts\ProductRepository $productRepository */
        $productRepository = resolve(ProductRepository::class);
        return $productRepository->orderBy('name');
    }

    private function getCategories(): Collection
    {
        /* @var \App\Repositories\Contracts\CategoryRepository $categoryRepository */
        $categoryRepository = resolve(CategoryRepository::class);
        return $categoryRepository->all();
    }
}
