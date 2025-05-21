<?php

namespace App\Services\Orders\Dto;

/**
 *
 */
final readonly class UpdateOrderDto
{
    /**
     * @param int $orderId
     * @param string $status
     */
    public function __construct(
        public int $orderId,
        public string $status,
    )
    {
    }
}
