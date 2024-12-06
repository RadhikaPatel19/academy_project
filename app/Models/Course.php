<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'status',
        'category_id',
        'level',
        'pricing_type',
        'price',
        'discounted_price',
        'thumbnail_image'
    ];

    // Define the inverse relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
