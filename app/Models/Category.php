<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Category;

class Category extends Model
{
    use HasFactory;

    // Add the fillable fields for mass assignment
    protected $fillable = ['name', 'parent_id'];

    /**
     * Get the parent category of the category (if any).
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
