<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    const STATUSES = [
        'new' => 'Новый',
        'completed' => 'Завершен'
    ];

    protected $fillable = [
        'product_id',
        'product_count',
        'customer_name',
        'comment',
        'status'
    ];

    /**
     * Get the product that owns order.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
