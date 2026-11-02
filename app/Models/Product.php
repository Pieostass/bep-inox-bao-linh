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
     * Get thumbnail URL (handles both uploaded paths from storage and external URLs)
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (empty($this->thumbnail)) {
            return 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80';
        }

        if (str_starts_with($this->thumbnail, 'http://') || str_starts_with($this->thumbnail, 'https://')) {
            return $this->thumbnail;
        }

        return asset('storage/' . $this->thumbnail);
    }

    /**
     * Get all images URLs for gallery and slideshow
     */
    public function getGalleryUrlsAttribute(): array
    {
        $urls = [];
        if (!empty($this->thumbnail)) {
            $urls[] = $this->thumbnail_url;
        }

        if (is_array($this->images)) {
            foreach ($this->images as $img) {
                if (empty($img)) continue;
                $url = (str_starts_with($img, 'http://') || str_starts_with($img, 'https://'))
                    ? $img
                    : asset('storage/' . $img);
                if (!in_array($url, $urls)) {
                    $urls[] = $url;
                }
            }
        }

        if (empty($urls)) {
            $urls[] = 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&auto=format&fit=crop&q=80';
        }

        return $urls;
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
