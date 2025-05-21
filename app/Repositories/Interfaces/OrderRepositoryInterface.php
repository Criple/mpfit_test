<?php

namespace App\Repositories\Interfaces;

use App\Services\Orders\Dto\StoreOrderDto;
use App\Services\Orders\Dto\UpdateOrderDto;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{

    /**
     * Gets list of all products
     *
     * @return Collection
     */
    public function getAllOrders(): Collection;

    /**
     * Stores product
     *
     * @param StoreOrderDto $storeOrderDto
     * @return bool
     */
    public function storeOrder(StoreOrderDto $storeOrderDto): bool;

    /**
     * @param UpdateOrderDto $updateOrderDto
     * @return bool
     */
    public function updateOrder(UpdateOrderDto $updateOrderDto): bool;

}
