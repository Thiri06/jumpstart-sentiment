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
}
