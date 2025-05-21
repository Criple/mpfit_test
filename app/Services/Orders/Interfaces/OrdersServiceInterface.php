<?php

namespace App\Services\Orders\Interfaces;

use App\Services\Orders\Dto\StoreOrderDto;
use App\Services\Orders\Dto\UpdateOrderDto;

interface OrdersServiceInterface
{

    /**
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
