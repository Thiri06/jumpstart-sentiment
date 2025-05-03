<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category', 'active'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageSentimentAttribute()
    {
        $positiveCount = $this->reviews()->where('sentiment', 'positive')->count();
        $totalCount = $this->reviews()->count();

        if ($totalCount === 0) {
            return 0;
        }

        return ($positiveCount / $totalCount) * 100;
    }
}
