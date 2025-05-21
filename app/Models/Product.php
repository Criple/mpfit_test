<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string $description
 * @property float $price
 */
class Product extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'price',
        'description',
    ];

    /**
     * Get the category that owns product.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the orders for the product.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
