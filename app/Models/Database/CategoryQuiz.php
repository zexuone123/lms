<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model;

class CategoryQuiz extends Model
{
    protected $table = 'categories_quizzes';

    protected $fillable = [
        'name',
    ];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
