<?php

namespace App\Services\Orders;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Services\Orders\Dto\StoreOrderDto;
use App\Services\Orders\Dto\UpdateOrderDto;
use App\Services\Orders\Interfaces\OrdersServiceInterface;

class OrdersService implements OrdersServiceInterface
{

    public function __construct(
        private readonly OrderRepositoryInterface $orderRepository,
    )
    {
    }

    /**
     * @param StoreOrderDto $storeOrderDto
     * @return bool
     */
    public function storeOrder(
        StoreOrderDto $storeOrderDto,
    ): bool
    {
        return $this->orderRepository->storeOrder($storeOrderDto);
    }

    /**
     * @param UpdateOrderDto $updateOrderDto
     * @return bool
     */
    public function updateOrder(
        UpdateOrderDto $updateOrderDto
    ): bool
    {
        return $this->orderRepository->updateOrder($updateOrderDto);
    }
}
