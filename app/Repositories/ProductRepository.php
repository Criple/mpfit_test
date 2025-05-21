<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Products\Dto\DeleteProductDto;
use App\Services\Products\Dto\StoreProductDto;
use App\Services\Products\Dto\UpdateProductDto;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * Gets list of all products
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    /**
     * Stores product
     *
     * @param StoreProductDto $storeProductDto
     * @return bool
     */
    public function storeProduct(StoreProductDto $storeProductDto): bool
    {
        if (
            Product::create([
                'title' => $storeProductDto->title,
                'category_id' => $storeProductDto->categoryId,
                'price' => $storeProductDto->price,
                'description' => $storeProductDto->description,
            ])
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param UpdateProductDto $updateProductDto
     * @return bool
     */
    public function updateProduct(UpdateProductDto $updateProductDto): bool
    {
        if (
            Product::updateOrCreate(
                [
                    'id' => $updateProductDto->id,
                ],
                [
                    'title' => $updateProductDto->title,
                    'category_id' => $updateProductDto->categoryId,
                    'price' => $updateProductDto->price,
                    'description' => $updateProductDto->description,
                ]
            )
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param DeleteProductDto $deleteProductDto
     * @return bool
     */
    public function deleteProduct(DeleteProductDto $deleteProductDto): bool
    {
        return Product::destroy($deleteProductDto->id);
    }

}
