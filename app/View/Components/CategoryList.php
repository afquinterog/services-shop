<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryList extends Component
{

    public Category $category;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.category-list');
    }
}
