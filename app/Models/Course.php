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
        'thumbnail_image',
        'requirements',
    ];

    // Define the inverse relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function enrolledStudents()
    {
        return $this->hasMany(EnrolledStudent::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
