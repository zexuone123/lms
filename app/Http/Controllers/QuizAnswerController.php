<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizAnswerController extends Controller
{
    public function submitAnswer(Request $request, $questionId)
    {
        $question = QuizQuestion::findOrFail($questionId);
        $acceptableAnswers = json_decode($question->acceptable_answers, true);

        // Ambil jawaban user dan ubah jadi lowercase untuk case-insensitive
        $userAnswer = strtolower(trim($request->input('answer')));

        // Bandingkan dengan daftar jawaban benar (case-insensitive)
        $isCorrect = in_array($userAnswer, array_map('strtolower', $acceptableAnswers));

        // Simpan jawaban
        QuizAnswer::create([
            'question_id' => $question->id,
            'user_id' => auth()->id(),
            'answer' => $request->input('answer'),
            'is_correct' => $isCorrect,
        ]);

        return back()->with('status', $isCorrect ? 'Jawaban benar!' : 'Jawaban salah!');
    }
}
