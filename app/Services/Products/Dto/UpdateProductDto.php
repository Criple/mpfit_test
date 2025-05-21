<?php

namespace App\Services\Products\Dto;

/**
 *
 */
final readonly class UpdateProductDto
{
    /**
     * @param int $id
     * @param string $title
     * @param int $categoryId
     * @param float $price
     * @param string $description
     */
    public function __construct(
        public int $id,
        public string $title,
        public int $categoryId,
        public float $price,
        public string $description = "",
    )
    {
    }
}
