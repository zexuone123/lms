<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Models\Database\CategoryQuiz;
use App\Models\Database\Quiz;
use App\Models\Database\QuizOption;
use App\Models\Database\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        $query = Quiz::with('questions')->latest();

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $quizzes = $query->paginate(10); 

        $categories = CategoryQuiz::all();

        return view('admin.pages.database.quiz.index', compact('quizzes', 'categories'));
    }

    public function create()
    {
        $categories = CategoryQuiz::all();
        return view('admin.pages.database.quiz.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required|exists:categories_quizzes,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'questions' => 'required|array',
                'questions.*.question' => 'required|string',
                'questions.*.acceptable_answers' => 'required|array|min:1',
                'questions.*.acceptable_answers.*' => 'required|string'
            ]);

            DB::beginTransaction();

            $quiz = Quiz::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            foreach ($request->questions as $qData) {
                $quiz->questions()->create([
                    'question' => $qData['question'],
                    'acceptable_answers' => json_encode($qData['acceptable_answers']),
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Quiz berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan quiz: ' . $e->getMessage());
        }
    }

    public function edit(Request $request, $id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        $categories = CategoryQuiz::all();

        return view('admin.pages.database.quiz.edit', compact('quiz', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required|exists:categories_quizzes,id',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'questions' => 'required|array',
                'questions.*.question' => 'required|string',
                'questions.*.acceptable_answers' => 'required|array|min:1',
                'questions.*.acceptable_answers.*' => 'required|string'
            ]);

            DB::beginTransaction();

            $quiz = Quiz::findOrFail($id);
            $quiz->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            // Hapus semua pertanyaan lama
            $quiz->questions()->delete();

            // Tambahkan pertanyaan baru
            foreach ($request->questions as $qData) {
                $quiz->questions()->create([
                    'question' => $qData['question'],
                    'acceptable_answers' => json_encode($qData['acceptable_answers']),
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Quiz berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui quiz: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $quiz = Quiz::findOrFail($id);

            $quiz->questions()->delete();

            $quiz->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Quiz berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus quiz: ' . $e->getMessage());
        }
    }
}
