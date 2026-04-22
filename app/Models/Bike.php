<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'brand', 'description', 'image', 'gallery',
        'price', 'daily_rate', 'stock',
        'is_active', 'available_for_hire',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_active' => 'boolean',
        'available_for_hire' => 'boolean',
        'price' => 'decimal:2',
        'daily_rate' => 'decimal:2',
    ];

    // auto-generate slug from name when creating, if not provided
    protected static function booted()
    {
        static::creating(function ($bike) {
            if (empty($bike->slug)) {
                $base = Str::slug($bike->name);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $bike->slug = $slug;
            }
        });
    }

    public function purchases()
    {
        return $this->hasMany(BikePurchase::class);
    }

    public function rentals()
    {
        return $this->hasMany(BikeRental::class);
    }

    // Scopes used by the landing page
    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }

    public function scopeHireable($q)
    {
        return $q->where('is_active', true)->where('available_for_hire', true);
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function getImageUrlAttribute(): string
{
    return $this->image
        ? asset('storage/app/public/' . $this->image)
        : asset('storage/app/public/bike-placeholder.png');
}
}