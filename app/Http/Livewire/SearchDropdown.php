<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
        $this->searchResults = [];

        if ($this->search)
        {
            $this->searchResults = Product::where('name' , 'like',  $this->search . '%'  )->get();
        }

        return view('livewire.search-dropdown');
    }
}
