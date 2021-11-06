<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\InteractsWithUI;
use App\Models\Category;
use Livewire\Component;

class ManageCategories extends Component
{
    use InteractsWithUI;

    public $categories;
    public $category;
    public $isEditing;

    protected $rules = [
        'category.code' => 'required|string',
        'category.name' => 'required|string|min:5',
        'category.description' => 'required|string',
        'category.order' => 'required|int'
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function select(Category $category=null)
    {
        $this->category = $category ?? new Category();
        $this->showEditForm(true);
    }

    public function showEditForm($show)
    {
        $this->isEditing = $show;
    }

    public function update()
    {
        $this->category->save();

        $this->categories = Category::all();
        $this->showEditForm(false);
        $this->notification(__('Categoria Guardado'),  __('Los datos de la categoría se guardaron correctamente') );
    }

    public function render()
    {
        return view('livewire.manage-categories', [
            'categories' => $this->categories
        ]);
    }
}
