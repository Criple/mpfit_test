<?php

namespace App\Services\Orders\Dto;

/**
 *
 */
final readonly class StoreOrderDto
{
    /**
     * @param int $productId
     * @param int $productCount
     * @param string $customerName
     * @param string $comment
     */
    public function __construct(
        public int $productId,
        public int $productCount,
        public string $customerName,
        public string $comment = "",
    )
    {
    }
}
