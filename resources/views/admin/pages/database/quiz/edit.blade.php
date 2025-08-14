@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">Edit Quiz</h3>

        <form method="POST" action="{{ route('quiz.update', $quiz->id) }}">
            @csrf
            @method('PUT')

            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $quiz->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $quiz->title }}"
                        required>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="2">{{ $quiz->description }}</textarea>
            </div>

            <hr>

            <h5 class="mb-3">Pertanyaan</h5>
            <div id="questions-container">
                @foreach ($quiz->questions as $index => $question)
                    <div class="card mb-3 question-item" data-index="{{ $index }}">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Pertanyaan {{ $index + 1 }}</strong>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-question">Hapus</button>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Teks Pertanyaan</label>
                                <input type="text" name="questions[{{ $index }}][question]" class="form-control"
                                    value="{{ $question->question }}" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Jawaban yang Diterima:</label>
                                <div class="answer-list">
                                    @foreach (json_decode($question->acceptable_answers, true) as $answer)
                                        <div class="input-group mb-2">
                                            <input type="text"
                                                name="questions[{{ $index }}][acceptable_answers][]"
                                                class="form-control" value="{{ $answer }}" required>
                                            <button type="button"
                                                class="btn btn-outline-danger remove-answer">Hapus</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary add-answer"
                                    data-index="{{ $index }}">+ Tambah Jawaban</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn btn-sm btn-primary mb-4" onclick="addQuestion()">+ Tambah Pertanyaan</button>

            <div class="d-flex justify-content-between">
                <a href="{{ route('quiz.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <script>
        let questionIndex = {{ $quiz->questions->count() }};

        function addQuestion() {
            const container = document.getElementById('questions-container');

            const questionDiv = document.createElement('div');
            questionDiv.classList.add('card', 'mb-3', 'question-item');
            questionDiv.dataset.index = questionIndex;

            questionDiv.innerHTML = `
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>Pertanyaan ${questionIndex + 1}</strong>
                <button type="button" class="btn btn-sm btn-outline-danger remove-question">Hapus</button>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Teks Pertanyaan</label>
                    <input type="text" name="questions[${questionIndex}][question]" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Jawaban yang Diterima:</label>
                    <div class="answer-list"></div>
                    <button type="button" class="btn btn-sm btn-outline-secondary add-answer" data-index="${questionIndex}">
                        + Tambah Jawaban
                    </button>
                </div>
            </div>
        `;

            container.appendChild(questionDiv);
            questionIndex++;
        }

        document.addEventListener('click', function(e) {
            // Tambah jawaban
            if (e.target.classList.contains('add-answer')) {
                const qIndex = e.target.dataset.index;
                const answerList = e.target.closest('.card-body').querySelector('.answer-list');
                const inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mb-2';

                inputGroup.innerHTML = `
                <input type="text" name="questions[${qIndex}][acceptable_answers][]" class="form-control" required>
                <button type="button" class="btn btn-outline-danger remove-answer">Hapus</button>
            `;

                answerList.appendChild(inputGroup);
            }

            // Hapus jawaban
            if (e.target.classList.contains('remove-answer')) {
                e.target.closest('.input-group').remove();
            }

            // Hapus pertanyaan
            if (e.target.classList.contains('remove-question')) {
                e.target.closest('.question-item').remove();
            }
        });
    </script>
@endsection
