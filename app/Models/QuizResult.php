<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score', 'answers'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
