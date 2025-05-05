<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'available_colors',
        'tags',
        'image',
    ];

    protected $casts = [
        'available_colors' => 'array',
        'tags' => 'array',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    /**
     * Get only product reviews (not inquiries).
     */
    public function productReviews()
    {
        return $this->hasMany(Review::class)->where('review_type', 'review');
    }

    /**
     * Get only product inquiries.
     */
    public function inquiries()
    {
        return $this->hasMany(Review::class)->where('review_type', 'inquiry');
    }
}
