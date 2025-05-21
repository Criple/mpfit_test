<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Services\Orders\Dto\StoreOrderDto;
use App\Services\Orders\Dto\UpdateOrderDto;
use Illuminate\Support\Collection;

class OrderRepository implements OrderRepositoryInterface
{

    /**
     * Gets list of all products
     *
     * @return Collection
     */
    public function getAllOrders(): Collection
    {
        return Order::all();
    }

    /**
     * Stores product
     *
     * @param StoreOrderDto $storeOrderDto
     * @return bool
     */
    public function storeOrder(StoreOrderDto $storeOrderDto): bool
    {
        if (
            Order::create([
                'product_id' => $storeOrderDto->productId,
                'product_count' => $storeOrderDto->productCount,
                'customer_name' => $storeOrderDto->customerName,
                'comment' => $storeOrderDto->comment,
            ])
        ) {
            return true;
        }

        return false;
    }

    /**
     * @param UpdateOrderDto $updateOrderDto
     * @return bool
     */
    public function updateOrder(UpdateOrderDto $updateOrderDto): bool
    {
        if (
            Order::updateOrCreate(
                [
                    'id' => $updateOrderDto->orderId,
                ],
                [
                    'status' => $updateOrderDto->status,
                ]
            )
        ) {
            return true;
        }

        return false;
    }

}
