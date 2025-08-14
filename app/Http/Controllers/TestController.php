<?php

namespace App\Http\Controllers;

use App\Models\Database\Quiz;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $Quiz = Quiz::all();
        return view('halamanTest.index', compact('Quiz'));
    }

    public function show($id)
    {
        $quiz = Quiz::with(['questions', 'category'])->findOrFail($id);
        return view('halamanTest.show', compact('quiz'));
    }
}
