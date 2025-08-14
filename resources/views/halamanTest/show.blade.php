<div class="container">
    <h3>{{ $quiz->title }}</h3>
    <p>Kategori: {{ $quiz->category->name ?? '-' }}</p>

    <form action="#" method="POST">
        @csrf

        @foreach ($quiz->questions as $key => $question)
            <div class="question-step" id="question_{{ $key }}" style="{{ $key === 0 ? '' : 'display: none;' }}">
                <p><strong>{{ $key + 1 }}. {{ $question->question }}</strong></p>
                @foreach ($question->options as $option)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]"
                            value="{{ $option->id }}" id="option_{{ $option->id }}">
                        <label class="form-check-label" for="option_{{ $option->id }}">
                            {{ $option->option_text }}
                        </label>
                    </div>
                @endforeach

                <div class="mt-3">
                    @if ($key < count($quiz->questions) - 1)
                        <button type="button" class="btn btn-primary next-btn" data-next="{{ $key + 1 }}">
                            Selanjutnya
                        </button>
                    @else
                        <button type="submit" class="btn btn-success">Selesai</button>
                    @endif
                </div>
            </div>
        @endforeach

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nextButtons = document.querySelectorAll('.next-btn');

        nextButtons.forEach(button => {
            button.addEventListener('click', function () {
                const next = this.getAttribute('data-next');
                const current = this.closest('.question-step');

                current.style.display = 'none';
                document.getElementById('question_' + next).style.display = 'block';
            });
        });
    });
</script>
