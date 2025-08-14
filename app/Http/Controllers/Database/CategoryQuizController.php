<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Models\Database\CategoryQuiz;
use Illuminate\Http\Request;

class CategoryQuizController extends Controller
{
    public function index(Request $request)
    {
        $categories = CategoryQuiz::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('admin.pages.database.quiz.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories_quizzes,name',
        ]);

        CategoryQuiz::create($request->all());
        return redirect()->route('category-quiz.index')->with('success', 'Category berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $category = CategoryQuiz::findOrFail($request->id);

        $request->validate([
            'name' => 'required|unique:categories_quizzes,name,' . $category->id,
        ]);

        $category->update($request->all());
        return redirect()->route('category-quiz.index')->with('success', 'Category berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $category = CategoryQuiz::findOrFail($request->id);
        $category->delete();
        return redirect()->route('category-quiz.index')->with('success', 'Category berhasil dihapus.');
    }
}
