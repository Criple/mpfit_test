<?php

namespace App\Services\Products\Dto;

/**
 *
 */
final readonly class DeleteProductDto
{

    /**
     * @param int $id
     */
    public function __construct(
        public int $id,
    )
    {
    }
}
