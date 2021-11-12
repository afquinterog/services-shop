<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\InteractsWithUI;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageConfiguration extends Component
{
    use InteractsWithUI;
    use WithFileUploads;

    public $company;
    public $companyLogoImage;

    protected $rules = [
        'company.name' => 'required|string',
        'company.description' => 'required|string|min:10',
        'company.meta_description' => 'required|string|min:10',
        'company.theme' => 'required|string',
        'company.whatsapp' => 'nullable|string',
        'company.instagram' => 'nullable|string',
        'companyLogoImage' => 'nullable|image'
    ];

    public function mount()
    {
        $this->company = auth()->user()->companies()->first();
    }

    public function update()
    {
        if ($this->companyLogoImage) {
            $storagePath = Auth::user()->companies()->first()->id . '';
            $this->company->logo = $this->companyLogoImage->store($storagePath, 's3');
        }

        $this->company->save();

        $this->notification(__('Configuration Saved'),  __('Configuration information has been stored properly.') );
    }

    public function render()
    {
        return view('livewire.manage-configuration');
    }
}
