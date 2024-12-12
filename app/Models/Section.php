<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'title', 'content'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
