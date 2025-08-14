<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';

    protected $fillable = [
        'quiz_id',
        'question',
        'acceptable_answers'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
