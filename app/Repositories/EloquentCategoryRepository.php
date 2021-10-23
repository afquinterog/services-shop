<?php


namespace App\Repositories;


use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;
use App\Traits\CompanyAware;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;

class EloquentCategoryRepository implements CategoryRepository
{
    use CompanyAware;

    public function save(Category $category): bool
    {
        Gate::authorize('create', Category::class);
        $this->setCompany($category);
        return $category->save();
    }

    public function getAll(): Collection
    {
        return Category::with('products')->orderBy('order')->get();
    }
}
