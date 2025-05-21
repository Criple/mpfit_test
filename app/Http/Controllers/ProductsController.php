<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Products\Dto\DeleteProductDto;
use App\Services\Products\Dto\StoreProductDto;
use App\Services\Products\Dto\UpdateProductDto;
use App\Services\Products\Interfaces\ProductsServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        ProductRepositoryInterface $productRepository,
    ): View
    {
        return view(
            'products.index',
            [
                'products' => $productRepository->getAllProducts()
            ]
        );
    }

    /**
     * Display a form to create resource.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     * @return View
     */
    public function showCreateForm(
        CategoryRepositoryInterface $categoryRepository
    ): View
    {
        return view(
            'products.formProduct',
            [
                'categories' => $categoryRepository->getAllCategories()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreProductRequest $storeProductRequest,
        ProductsServiceInterface $productsService
    ): RedirectResponse
    {
        if (
            $productsService->storeProduct(
                new StoreProductDto(
                    $storeProductRequest->get('title'),
                    $storeProductRequest->get('category'),
                    $storeProductRequest->get('price'),
                    $storeProductRequest->get('description'),
                )
            )
        ) {
            return redirect()->route('index');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Product $product,
        CategoryRepositoryInterface $categoryRepository
    ): View
    {
        return view(
            'products.formProduct',
            [
                'product' => $product,
                'categories' => $categoryRepository->getAllCategories()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Product $product,
        UpdateProductRequest $updateProductRequest,
        ProductsServiceInterface $productsService
    ): RedirectResponse
    {
        if (
            $productsService->updateProduct(
                new UpdateProductDto(
                    $product->id,
                    $updateProductRequest->get('title'),
                    $updateProductRequest->get('category'),
                    $updateProductRequest->get('price'),
                    $updateProductRequest->get('description'),
                )
            )
        ) {
            return redirect()->route('index');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $id,
        ProductsServiceInterface $productsService
    ): RedirectResponse
    {
        $productsService->deleteProduct(new DeleteProductDto(
            $id
        ));

        return redirect()->route('index');
    }
}
