<?php


namespace App\Repositories\Contracts;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{


    public function save(Category $category): bool;

    public function getAll(): Collection;
}
