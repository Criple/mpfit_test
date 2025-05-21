<?php

namespace App\Services\Products;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Products\Dto\DeleteProductDto;
use App\Services\Products\Dto\StoreProductDto;
use App\Services\Products\Dto\UpdateProductDto;
use App\Services\Products\Interfaces\ProductsServiceInterface;

class ProductsService implements ProductsServiceInterface
{

    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    )
    {
    }

    /**
     * @param StoreProductDto $storeProductDto
     * @return bool
     */
    public function storeProduct(
        StoreProductDto $storeProductDto,
    ): bool
    {
        return $this->productRepository->storeProduct($storeProductDto);
    }

    /**
     * @param UpdateProductDto $updateProductDto
     * @return bool
     */
    public function updateProduct(
        UpdateProductDto $updateProductDto
    ): bool
    {
        return $this->productRepository->updateProduct($updateProductDto);
    }

    /**
     * @param DeleteProductDto $deleteProductDto
     * @return bool
     */
    public function deleteProduct(
        DeleteProductDto $deleteProductDto,
    ): bool
    {
        return $this->productRepository->deleteProduct($deleteProductDto);
    }
}
