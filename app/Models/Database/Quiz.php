<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'category_id',
        'title',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryQuiz::class);
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
