@foreach ($Quiz as $quiz)
    <div class="card mb-4">
        <div class="card-body">
            <h5>{{ $quiz->title }}</h5>
            <p>Kategori: {{ $quiz->category->name ?? '-' }}</p>

            <a href="{{ route('quiz.show', $quiz->id) }}" class="btn btn-primary">
                Mulai Quiz
            </a>
        </div>
    </div>
@endforeach
