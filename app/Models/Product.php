<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'price',
        'price_label',
        'original_price',
        'discount_percent',
        'badge',
        'thumbnail',
        'images',
        'short_description',
        'description',
        'specifications',
        'warranty_months',
        'is_featured',
        'is_active',
        'views_count',
    ];

    protected $casts = [
        'images' => 'array',
        'specifications' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'integer',
        'original_price' => 'integer',
        'warranty_months' => 'integer',
        'views_count' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get display price string
     */
    public function getDisplayPriceAttribute(): string
    {
        if ($this->price && $this->price > 0) {
            return number_format($this->price, 0, ',', '.') . ' đ';
        }

        return $this->price_label ?: 'Liên hệ';
    }

    /**
     * Get display original price string if any
     */
    public function getDisplayOriginalPriceAttribute(): ?string
    {
        if ($this->original_price && $this->original_price > 0) {
            return number_format($this->original_price, 0, ',', '.') . ' đ';
        }

        return null;
    }
}
