<?php

namespace App\Repositories\Interfaces;

use App\Services\Products\Dto\DeleteProductDto;
use App\Services\Products\Dto\StoreProductDto;
use App\Services\Products\Dto\UpdateProductDto;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{

    /**
     * Gets list of all products
     *
     * @return Collection
     */
    public function getAllProducts(): Collection;

    /**
     * Stores product
     *
     * @param StoreProductDto $storeProductDto
     * @return bool
     */
    public function storeProduct(StoreProductDto $storeProductDto): bool;

    /**
     * @param UpdateProductDto $updateProductDto
     * @return bool
     */
    public function updateProduct(UpdateProductDto $updateProductDto): bool;

    /**
     * @param DeleteProductDto $deleteProductDto
     * @return bool
     */
    public function deleteProduct(DeleteProductDto $deleteProductDto): bool;

}
