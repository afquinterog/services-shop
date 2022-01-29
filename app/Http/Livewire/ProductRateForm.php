<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductRate;
use App\Repositories\Contracts\ProductRateRepository;
use Livewire\Component;

class ProductRateForm extends Component
{
    public Product $product;
    public $rateSent = false;
    public ProductRate $rate;

    protected $rules = [
        'rate.rating' => 'required|int',
        'rate.message' => 'required|string',
    ];

    public function mount()
    {
        $this->rate = new ProductRate();
    }

    public function render()
    {
        return view('livewire.product-rate-form');
    }

    public function updated($propertyName)
    {
        $this->rateSent = false;
        $this->validateOnly($propertyName);
    }

    public function createRate(ProductRateRepository $productRateRepository)
    {
        $this->validate();

        $productRateRepository->rate($this->product, $this->rate->rating, $this->rate->message);
        $this->rate = new ProductRate();
        $this->rateSent = true;
    }
}
