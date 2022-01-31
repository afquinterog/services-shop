<?php

namespace App\Http\Livewire;


use App\Repositories\Contracts\MarketplaceRepository;
use Livewire\Component;
use Livewire\WithPagination;

class MarketplaceList extends Component
{
    use WithPagination;

    const ITEMS_PER_PAGE = 12;

    public $search = '';

    public $categories = [];

    public $vendors = [];

    public $order = 'products.name';

    public $actualCategory;

    public $actualVendor;

    public function mount(MarketplaceRepository $marketplaceRepository)
    {
        //repos
        $this->categories = $marketplaceRepository->categories();
        $this->vendors = $marketplaceRepository->vendors();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingActualCategory()
    {
        $this->resetPage();
    }

    public function updatingActualVendor()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.marketplace-list', [
            'products' => $this->getProducts()
        ]);
    }

    private function getProducts()
    {
        /* @var \App\Repositories\Contracts\MarketplaceRepository $marketPlaceRepository */
        $marketPlaceRepository = resolve(MarketplaceRepository::class);

        return $marketPlaceRepository->get(self::ITEMS_PER_PAGE, $this->order, $this->search, $this->actualCategory, $this->actualVendor);
    }
}
