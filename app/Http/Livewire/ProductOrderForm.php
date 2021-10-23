<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepository;
use App\Traits\CompanyAware;
use Livewire\Component;

class ProductOrderForm extends Component
{
    use CompanyAware;

    public Product $product;
    public Order $order;
    public $orderSent = false;

    protected $rules = [
        'order.name' => 'required|string|min:6',
        'order.phone' => 'required|string|max:10',
        'order.quantity' => 'required|numeric|max:10',
    ];

    protected $validationAttributes = [
        'order.name' => 'nombre',
        'order.phone' => 'telefono',
        'order.quantity' => 'cantidad',
    ];

    public function mount()
    {
        $this->order = new Order();
    }

    public function updated($propertyName)
    {
        $this->orderSent = false;
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.product-order-form', [
            'product' => $this->product,
        ]);
    }

    public function createOrder(ProductRepository $productRepository)
    {
        $this->validate();
        $this->setCompany($this->order);
        $productRepository->addOrder($this->product, $this->order);

        //Clean data
        $this->order = new Order();
        $this->orderSent = true;
    }
}
