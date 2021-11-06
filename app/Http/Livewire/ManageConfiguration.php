<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\InteractsWithUI;
use Livewire\Component;

class ManageConfiguration extends Component
{
    use InteractsWithUI;

    public $company;

    protected $rules = [
        'company.name' => 'required|string',
        'company.description' => 'required|string|min:10',
        'company.meta_description' => 'required|string|min:10',
        'company.theme' => 'required|string'
    ];

    public function mount()
    {
        $this->company = auth()->user()->companies()->first();
    }

    public function update()
    {
        $this->company->save();

        $this->notification(__('Configuration Saved'),  __('Configuration information has been stored properly.') );
    }

    public function render()
    {
        return view('livewire.manage-configuration');
    }
}
