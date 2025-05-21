<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{

    /**
     * Gets list of all categories
     *
     * @return Collection
     */
    public function getAllCategories(): Collection;

}
