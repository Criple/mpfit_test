<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * Gets list of all categories
     *
     * @return Collection
     */
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

}
